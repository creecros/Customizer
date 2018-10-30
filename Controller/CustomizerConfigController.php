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
 /*
  * is this really needed?
  */
 /*
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
*/
        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

          $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }


    
}
