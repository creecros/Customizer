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
                $this->response->withCache(5 * 86400, $etag);
                $this->response->send();
                $this->objectStorage->output($file['path']);
            } catch (ObjectStorageException $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }
	
    /**
     * Output file without cache
     *
     * @param array $file
     * @param $mimetype
     */
    protected function renderFileWithoutCache(array $file, $mimetype)
    {
        $etag = md5($file['path']);

        if ($this->request->getHeader('If-None-Match') === '"'.$etag.'"') {
            $this->response->status(304);
        } else {
            try {
                $this->response->withContentType($mimetype);
                $this->response->withOutCache();
                $this->response->send();
                $this->objectStorage->output($file['path']);
            } catch (ObjectStorageException $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }
    
    public function show()
    {
        $logo         = $this->customizerFileModel->getByType(1)?? ['id' => null, 'name' => null];
        $flavicon     = $this->customizerFileModel->getByType(2) ?? ['id' => null, 'name' => null];
        $loginlogo    = $this->customizerFileModel->getByType(3) ?? ['id' => null, 'name' => null];
        $logopath     = $logo['path'] ?? null;
        $flaviconpath = $flavicon['path'] ?? null;
        $this->response->html(
            $this->helper->layout->config(
                'customizer:file/show',
                [
                    'logo'         => $logo,
                    'title'        => t('Settings') . ' &gt; ' . t('Customizer'),
                    'flavicon'     => $flavicon,
                    'logopath'     => $logopath,
                    'flaviconpath' => $flaviconpath,
                    'loginlogo'    => $loginlogo,
                ]
            )
        );
    }
    
    public function logo()
    {
	if ($this->logoexists()) {
        $file = $this->customizerFileModel->getByType(1);
	 if ($this->configModel->get('enable_cache', '') == 'checked') {  
       	 	$this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
	 } else {
       	 	$this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	 }
	} 
    }
	
    public function logo_setting()
    {
	if ($this->logoexists()) {
        $file = $this->customizerFileModel->getByType(1);
        $this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	} 
    }
	
    public function loginlogo()
    {
	if ($this->loginlogoexists()) {
        $file = $this->customizerFileModel->getByType(3);
	 if ($this->configModel->get('enable_cache', '') == 'checked') {  
       	 	$this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
	 } else {
       	 	$this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	 }
	}    
    }
	
    public function loginlogo_setting()
    {
	if ($this->loginlogoexists()) {
        $file = $this->customizerFileModel->getByType(3);
        $this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	}    
    }
	
    public function icon()
    {
	if ($this->iconexists()) {
        $file = $this->customizerFileModel->getByType(2);
	 if ($this->configModel->get('enable_cache', '') == 'checked') {  
       	 	$this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
	 } else {
       	 	$this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	 }
	} 
    }
	
    public function icon_setting()
    {
	if ($this->iconexists()) {
        $file = $this->customizerFileModel->getByType(2);
        $this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
	} 
    }
    
    public function link()
    {
	if ($this->logoexists() && $this->linkexists()) {
        	return $this->response->redirect($this->configModel->get('login_link', 'https://kanboard.org'));
	} else {
		return $this->response->redirect($this->configModel->get('application_url', '') . 'login');
	}	    
    }
    
    public function logoexists()
    {
        if (null !== $this->customizerFileModel->getByType(1)) { return true; } else { return false; }  
    }
	
    public function loginlogoexists()
    {
        if (null !== $this->customizerFileModel->getByType(3)) { 
		$customizer['loginCheck'] = true;
		return true; 
	} else { 
		$customizer['loginCheck'] = false;
		return false; 
	}  
    }
   
    public function linkexists()
    {
        if ($this->configModel->exists('login_link')) { return true; } else { return false; }  
    }
	
    public function iconexists()
    {
        if (null !== $this->customizerFileModel->getByType(2)) { return true; } else { return false; }  
    }
        
    public function image()
    {
       	 $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
	 if ($this->configModel->get('enable_cache', '') == 'checked') {  
       	 	$this->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
	 } else {
       	 	$this->renderFileWithoutCache($file, $this->helper->file->getImageMimeType($file['name']));
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
        $custom_id = $this->request->getIntegerParam('custom_id');
        if ($custom_id == 1) {
            $this->response->html($this->template->render('customizer:file/upload_logo', array(
            'custom_id' => $custom_id,
	    'multiple' => false,
        )));
        } else if ($custom_id == 2) {
            $this->response->html($this->template->render('customizer:file/upload_flavicon', array(
            'custom_id' => $custom_id,
	    'multiple' => false,
        )));
        } else if ($custom_id == 3) {
            $this->response->html($this->template->render('customizer:file/upload_loginlogo', array(
            'custom_id' => $custom_id,
	    'multiple' => false,
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
	    if ($custom_id ==3) { $loginCheck = true; }
        
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
	
    public function removeform()
    {
        $this->checkCSRFParam();
        $custom_id = $this->request->getIntegerParam('custom_id');
	if ($custom_id == 3) { $loginCheck = false; }
        $file = $this->customizerFileModel->getById($this->request->getIntegerParam('file_id'));
        if ($this->customizerFileModel->remove($file['id'])) {
            $this->flash->success(t('File removed successfully.'));
        } else {
            $this->flash->failure(t('Unable to remove this file.'));
        }
	    
	return $this->response->redirect($this->configModel->get('application_url', '') . 'settings/customizer');
        
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
