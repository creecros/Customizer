<?php

namespace Kanboard\Plugin\Customizer\Controller;

require_once __DIR__.'/../vendor/autoload.php';

use Kanboard\Model\ConfigModel;
use Kanboard\Model\LanguageModel;
use Kanboard\Controller\BaseController;
use luizbills\CSS_Generator\Generator as CSS_Generator;

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
        
        if (array_key_exists('use_custom_login', $values) === false) { $this->configModel->save(['use_custom_login' => '']); }
        
        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

          $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
    
    public function create_theme()
    {
        $values =  $this->request->getValues();
        
        $options = [
        // default values
        // 'indentation' => '    ', // 4 spaces
        ];
        
        $css = new CSS_Generator($options);

        // Header
        $css->add_rule('header', 
            [
             'background-color' => $values['header_background']
            ]
        );
        $css->add_rule('header h1', 
            [
                'color' => $values['header_title']
            ]
        );
        $css->add_rule('a i.web-notification-icon', 
            [
                'color' => $values['notification_icon']
            ]
        );
        // Body
        $css->add_rule('body', 
            [
                'background' => $value['background_color'],
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('a:hover', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('a .fa', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule(['h1', 'h2'], 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.table-list-header a', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.table-list-header .table-list-header-count', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.table-list-row .table-list-title a', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.dropdown-menu-link-icon', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.page-header h2 a', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.sidebar>ul a:hover', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.sidebar>ul li.active a', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.task-list-icons a:hover', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.task-list-icons a:hover i', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('.subtask-cell a', 
            [
                'color' => $values['font_main']
            ]
        );
        $css->add_rule('a', 
            [
                'color' => $values['font_link']
            ]
        );
        $css->add_rule('.table-list-category a:hover', 
            [
                'color' => $values['font_link']
            ]
        );
        $css->add_rule(['.subtask-cell a:hover', '.subtask-cell a:focus'], 
            [
                'color' => $values['font_link']
            ]
        );
        $css->add_rule('', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('', 
            [
                'color' => $values['font_secondary']
            ]
        );
        
                                   
        $minify = false;
        
        $extension = '.css';
        $rename = str_replace('.', '', $values['theme_name']);
                                   
        if (file_exists(DATA_DIR . '/files/customizer/themes')) {
          file_put_contents(DATA_DIR . '/files/customizer/themes/' . $rename . $extension, $css->get_output($minify));
        } else {
          mkdir(DATA_DIR . '/files/customizer/themes', 0755);
          file_put_contents(DATA_DIR . '/files/customizer/themes/' . $rename . $extension, $css->get_output($minify));
        }
        
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
}
