<?php

namespace Kanboard\Plugin\Customizer\Controller;

use Kanboard\Plugin\Customizer\Model\CustomizerFileModel;
use Kanboard\Core\ObjectStorage\ObjectStorageException;
use Kanboard\Controller\BaseController;
use Kanboard\Model\ConfigModel;

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
                $this->response->withOutCache();
                // $this->response->withCache(5 * 86400, $etag);
                $this->response->send();
                $this->objectStorage->output($file['path']);
            } catch (ObjectStorageException $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }
    
    public function show()
    {
        $logo = $this->customizerFileModel->getByType(1);
        $flavicon = $this->customizerFileModel->getByType(2);
        $logopath = $logo['path'];
        $flaviconpath = $flavicon['path'];
        $this->response->html($this->helper->layout->config('customizer:file/show', array(
            'logo' => $logo,
            'title' => t('Settings').' &gt; '.t('Customizer'),
            'flavicon' => $flavicon,
            'logopath' => $logopath,
            'flaviconpath' => $flaviconpath, 
        )));
        
    }
    
    public function logo()
    {
        $file = $this->customizerFileModel->getByType(1);
        $this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
    }
    
    public function link()
    {
        return $this->configModel->getOptions('login_link', 'https://kanboard.org');
    }
    
    public function logoexists()
    {
        if (null !== $this->customizerFileModel->getByType(1)) { return true; } else { return false; }  
    }
   
    public function linkexists()
    {
        if ($this->configModel->exists('login_link')) { return true; } else { return false; }  
    }
    
    public function loginpage()
    {
        if ($this->logoexists() && $this->linkexists()) {
            return 	'<a href="" target="_blank"><?php endif ?>
		             <img src="' . $this->logo() . '" height="50">
	                 </a>';
        } else if ($this->logoexists()) {
            return '<img src="' . $this->logo() . '" height="50">';
        } else {
            return '';
        }
    }
    
   
    
    public function image()
    {
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
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
        $custom_id = $this->request->getIntegerParam('custom_id');
        if ($custom_id == 1) {
            $this->response->html($this->template->render('customizer:file/upload_logo', array(
            'custom_id' => $custom_id,
            'max_size' => $this->helper->text->phpToBytes(get_upload_max_size()),
        )));
        } else {
            $this->response->html($this->template->render('customizer:file/upload_flavicon', array(
            'custom_id' => $custom_id,
            'max_size' => $this->helper->text->phpToBytes(get_upload_max_size()),
        )));
        }
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
        $custom_id = $this->request->getIntegerParam('custom_id');
        
        $result = $this->customizerFileModel->uploadFiles($custom_id, $this->request->getFileInfo('files'));
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
        $custom_id = $this->request->getIntegerParam('custom_id');
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        if ($this->customizerFileModel->remove($file['id'])) {
            $this->flash->success(t('File removed successfully.'));
        } else {
            $this->flash->failure(t('Unable to remove this file.'));
        }
        
    }
    /**
     * Confirmation dialog before removing a file
     *
     * @access public
     */
    public function confirm()
    {
        $custom_id = $this->request->getIntegerParam('custom_id');
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        $this->response->html($this->template->render('customizer:file/remove', array(
            'custom_id' => $custom_id,
            'file' => $file,
        )));
    }
}
