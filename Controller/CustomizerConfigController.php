<?php

namespace Kanboard\Plugin\Customizer\Controller;

use Kanboard\Model\ConfigModel;
use Kanboard\Model\LanguageModel;
use Kanboard\Controller\BaseController;

/**
 * Config Controller
 *
 * @package  Customizer/Controller
 * @author   creecros
 */
class CustomizerConfigController extends BaseController
{
    
    /**
     * Save settings
     *
     */
    public function save()
    {
        $values =  $this->request->getValues();

        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

          $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
    /**
     * Load css file
     *
     * @access public
     */
    public function cssparse()
    {
        $filename = $this->request->getStringParam('file');
        $model = $this->customizerFileModel->loadCSS($filename);
        define('CSS_PARSE_RESULTS', 'test_value');
        $customizer['cssparser'] = $model;
        foreach ($customizer['cssparser'] as $k) { error_log($k,0); }

       // $this->flash->success(t('CSS file loaded.'));
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
}
