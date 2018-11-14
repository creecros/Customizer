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
        
        if (array_key_exists('use_custom_login', $values) == false) { $this->configModel->remove('use_custom_login'); }
        
        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

          $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
}
