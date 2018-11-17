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
        // Submenu
        $css->add_rule('.dropdown-submenu-open a', 
            [
                'text-decoration' => 'none',
                'color' => $values['dropdown_submenu_color']
            ]
        );
        $css->add_rule('.dropdown-submenu-open li:not(.no-hover):hover', 
            [
                'background' => $values['dropdown_submenu_background_hover'],
                'color' => $values['dropdown_submenu_color_hover']
            ]
        );
        // Button
        $css->add_rule('.btn-blue', 
            [
                'border-color' => $values['btn_border_color'],
                'background' => $values['btn_background'],
                'color' => $values['btn_text_color']
            ]
        );
        $css->add_rule('.btn-blue:hover, .btn-blue:focus', 
            [
                'border-color' => $values['btn_border_color_hover'],
                'background' => $values['btn_background_hover'],
                'color' => $values['btn_text_color_hover']
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
