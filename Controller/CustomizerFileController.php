<?php

namespace Kanboard\Plugin\Customizer\Controller;

use Kanboard\Core\ObjectStorage\ObjectStorageException;
use Kanboard\Controller\BaseController;

/**
 * Customizer Controller
 *
 * @package  Customizer\Controller
 * @author   creecros
 */
class CustomizerFileController extends BaseController
{

    /**
     * Get file content from object storage
     *
     * @access protected
     * @param  array $file
     * @return string
     */
    protected function getFileContent(array $file)
    {
        $content = '';

        try {
            if ($file['is_image'] == 0) {
                $content = $this->objectStorage->get($file['path']);
            }
        } catch (ObjectStorageException $e) {
            $this->logger->error($e->getMessage());
        }

        return $content;
    }

    /**
     * Output file with cache
     *
     * @param array $file
     * @param $mimetype
     */
    protected function renderFileWithCache(array $file, $mimetype)
    {
        $etag = md5($file['path']);

        if ($this->request->getHeader('If-None-Match') === '"'.$etag.'"') {
            $this->response->status(304);
        } else {
            try {
                $this->response->withContentType($mimetype);
                $this->response->withCache(5 * 86400, $etag);
                $this->response->send();
                $this->objectStorage->output($file['path']);
            } catch (ObjectStorageException $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }

    /**
     * Show file content in a popover
     *
     * @access public
     */
    public function show()
    {
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $type = $this->helper->file->getPreviewType($file['name']);
        $params = array('file_id' => $file['id'], 'custom_id' => $file['custom_id']);
        
        $this->response->html($this->template->render('file_viewer/show', array(
            'file' => $file,
            'params' => $params,
            'type' => $type,
            'content' => $this->getFileContent($file),
        )));
    }

    /**
     * Display image
     *
     * @access public
     */
    public function image()
    {
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
    }

    /**
     * Display file in browser
     *
     * @access public
     */
    public function browser()
    {
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $this->renderFileWithCache($file, $this->helper->file->getBrowserViewType($file['name']));
    }

    /**
     * Display image thumbnail
     *
     * @access public
     */
    public function thumbnail()
    {
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $model = 'customizerFileModel';
        $filename = $this->$model->getThumbnailPath($file['path']);
        $etag = md5($filename);

        $this->response->withCache(5 * 86400, $etag);
        $this->response->withContentType('image/jpeg');

        if ($this->request->getHeader('If-None-Match') === '"'.$etag.'"') {
            $this->response->status(304);
        } else {

            $this->response->send();

            try {

                $this->objectStorage->output($filename);
            } catch (ObjectStorageException $e) {
                $this->logger->error($e->getMessage());

                // Try to generate thumbnail on the fly for images uploaded before Kanboard < 1.0.19
                $data = $this->objectStorage->get($file['path']);
                $this->$model->generateThumbnailFromData($file['path'], $data);
                $this->objectStorage->output($this->$model->getThumbnailPath($file['path']));
            }
        }
    }

    /**
     * File download
     *
     * @access public
     */
    public function download()
    {
        try {
            $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
            $file['model'] = 'customizerFileModel';
            $this->response->withFileDownload($file['name']);
            $this->response->send();
            $this->objectStorage->output($file['path']);
        } catch (ObjectStorageException $e) {
            $this->logger->error($e->getMessage());
        }
    }
    
    /**
     * File upload form
     *
     * @access public
     */
    public function create()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $wiki = $this->wiki->getWiki();
        $this->response->html($this->template->render('wiki:wiki_file/create', array(
            'wiki' => $wiki,
            'max_size' => $this->helper->text->phpToBytes(get_upload_max_size()),
        )));
    }
    /**
     * File upload (save files)
     *
     * @access public
     */
    public function save()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $wiki = $this->wiki->getWiki();
        
        $result = $this->wikiFile->uploadFiles($wiki['id'], $this->request->getFileInfo('files'));
        if ($this->request->isAjax()) {
            if (!$result) {
                $this->response->json(array('message' => t('Unable to upload files, check the permissions of your data folder.')), 500);
            } else {
                $this->response->json(array('message' => 'OK'));
            }
        } else {
            if (!$result) {
                $this->flash->failure(t('Unable to upload files, check the permissions of your data folder.'));
            }
            
            $this->response->redirect($this->helper->url->to('WikiController', 'detail', array('plugin' => 'wiki', 'project_id' => $wiki['project_id'], 'wiki_id' => $wiki['id'])), true);
            // $this->response->redirect($this->helper->url->to('WikiViewController', 'show', array('wiki_id' => $wiki['id'], 'project_id' => $wiki['project_id'])), true);
        }
    }
    /**
     * Remove a file
     *
     * @access public
     */
    public function remove()
    {
        $this->checkCSRFParam();
        $wiki = $this->wiki->getWiki();
        $file = $this->wikiFile->getById($this->request->getIntegerParam('file_id'));
        if ($file['wikipage_id'] == $wiki['id'] && $this->wikiFile->remove($file['id'])) {
            $this->flash->success(t('File removed successfully.'));
        } else {
            $this->flash->failure(t('Unable to remove this file.'));
        }
            $this->response->redirect($this->helper->url->to('WikiController', 'detail', array('plugin' => 'wiki', 'project_id' => $wiki['project_id'], 'wiki_id' => $wiki['id'])), true);
    }
    /**
     * Confirmation dialog before removing a file
     *
     * @access public
     */
    public function confirm()
    {
        $wiki = $this->wiki->getWiki();
        $file = $this->wikiFile->getById($this->request->getIntegerParam('file_id'));
        $this->response->html($this->template->render('wiki:wiki_file/remove', array(
            'wiki' => $wiki,
            'file' => $file,
        )));
    }
}
