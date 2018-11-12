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

        if (isset($_POST["submit"]) && $_POST["submit"] == 'loadtheme') {
            if (isset($_POST["themeSelection"]) && $_POST["themeSelection"] != '') {
                $filename = $_POST["themeSelection"];
            } else {
                $filename = 'default';
            }
            // $this->flash->success(t('CSS file loaded.'));
            $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer', 'file_for_model' => $filename)));
        } else {
            if ($this->configModel->save($values)) {
                $this->languageModel->loadCurrentLanguage();
                $this->flash->success(t('Settings saved successfully.'));
            } else {
                $this->flash->failure(t('Unable to save your settings.'));
            }

            $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
        }
    }
}
