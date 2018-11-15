<?php

namespace Kanboard\Plugin\Customizer\Controller;

require_once __DIR__.'../vendor/autoload.php';

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

        // single selector
        $css->add_rule('header', ['background-color' => $values['header_background']]);
                                   
        $minify = false;
                                   
        file_put_contents('plugins/Customizer/Assets/css/themes/' . $values['theme_name'], $css->get_output($minify));
        
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
}
