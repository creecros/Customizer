<?php

namespace Kanboard\Plugin\Customizer\Controller;

use Kanboard\Model\ConfigModel;
use Kanboard\Model\LanguageModel;

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
        $redirect = $this->request->getStringParam('redirect', 'application');

        switch ($redirect) {
            case 'application':
                $values += array('password_reset' => 0);
                break;
            case 'project':
                $values += array(
                    'subtask_restriction' => 0,
                    'subtask_time_tracking' => 0,
                    'cfd_include_closed_tasks' => 0,
                    'disable_private_project' => 0,
                );
                break;
        }

        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

        $this->response->redirect($this->helper->url->to('ConfigController', $redirect));
    }

    /**
     * Display the Customizer settings page
     *
     * @access public
     */
    public function application()
    {
        $logo = $this->customizerFileModel->getByType(1);
        $flavicon = $this->customizerFileModel->getByType(2);
	    $loginlogo = $this->customizerFileModel->getByType(3);
        $logopath = $logo['path'];
        $flaviconpath = $flavicon['path'];
        $this->response->html($this->helper->layout->config('customizer:file/show', array(
            'logo' => $logo,
            'title' => t('Settings').' &gt; '.t('Customizer'),
            'flavicon' => $flavicon,
            'logopath' => $logopath,
            'flaviconpath' => $flaviconpath, 
            'loginlogo' => $loginlogo
        )));
    }

    
}
