<?php

namespace Kanboard\Plugin\Customizer;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
		
    public function initialize()
    {
	global $customizer;
	    
	// Themes
	$customizer['themes'] = array(
		'Default' => ''
		);
	
	$scanned_themes = array_diff(scandir('plugins/Customizer/Assets/css/themes'), array('..', '.'));
	    
	foreach ($scanned_themes as $theme) {
		if ($theme !== '..') {
		$customizer['themes'][rtrim($theme, '.css')] = 'plugins/Customizer/Assets/css/themes/' . $theme;
		}
	}
	    
	if ($this->configModel->get('themeSelection', '') == '') {
        file_put_contents('plugins/Customizer/Assets/css/theme.css', '');
	} else {
        file_put_contents('plugins/Customizer/Assets/css/theme.css', fopen($this->configModel->get('themeSelection', ''), 'r'));
	}
	    
        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Assets/css/theme.css'));
	    
        //Helper
        $this->helper->register('themeHelper', '\Kanboard\Plugin\Customizer\Helper\ThemeHelper');
	    
	//Check if login logo is set
        if (null !== $this->customizerFileModel->getByType(3)) { 
		    $customizer['loginCheck'] = true;
	    } else { 
		    $customizer['loginCheck'] = false;
	    } 
	    
	//Grabs login page settings from database   
	$customizer['backURL'] = $this->configModel->get('background_url', '');
	$customizer['backColor'] = $this->configModel->get('loginbackground_color', '#ffffff');
	$customizer['logoSize'] = $this->configModel->get('loginlogo_size', '50');
	$customizer['loginpanel_color'] = $this->configModel->get('loginpanel_color', '#ffffff');
	$customizer['login_shadow_color'] = $this->configModel->get('login_shadow_color', '#333');
	$customizer['login_shadow'] = $this->configModel->get('login_shadow', '0');
	$customizer['login_border_color'] = $this->configModel->get('login_border_color', '#ffffff');
	$customizer['login_border'] = $this->configModel->get('login_border', '0');
	$customizer['login_btn_color'] = $this->configModel->get('login_btn_color', '#3079ed');
	$customizer['login_btn_shadow_color'] = $this->configModel->get('login_btn_shadow_color', '#333');
	$customizer['login_btn_border_color'] = $this->configModel->get('login_btn_border_color', 'transparent');
	$customizer['login_btn_shade_color'] = $this->configModel->get('login_btn_shade_color', 'transparent');
	$customizer['login_btn_font_color'] = $this->configModel->get('login_btn_font_color', '#ffffff');
	$customizer['login_btn_shadow'] = $this->configModel->get('login_btn_shadow', '0');
	$customizer['login_btn_border'] = $this->configModel->get('login_btn_border', '0');
	$customizer['login_btn_width'] = $this->configModel->get('login_btn_width', '95');
	    
        //Templates and Assets
        $this->template->hook->attach('template:config:sidebar', 'customizer:config/sidebar');
        $this->template->setTemplateOverride('header/title', 'customizer:header/title');
        $this->template->setTemplateOverride('layout', 'customizer:layout/layout');
        $this->template->setTemplateOverride('auth/index', 'customizer:layout/index');
        $this->template->hook->attach('template:auth:login-form:before', 'customizer:layout/logintop');
        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Assets/rgbaColorPicker/rgbaColorPicker.css'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/Customizer/Assets/rgbaColorPicker/rgbaColorPicker.js'));
        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Assets/css/customizer.css'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/Customizer/Assets/js/customizer.js'));
	    
	//Routes
        $this->route->addRoute('settings/customizer', 'CustomizerFileController', 'show', 'Customizer');
	    
	//Permissions for login page to access logos    
        $this->applicationAccessMap->add('CustomizerFileController', array('image', 'loginlogo', 'logo', 'link', 'logoexists', 'linkexists'), Role::APP_PUBLIC);
	    
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
    
    public function getClasses() {
        return array(
            'Plugin\Customizer\Model' => array(
                'CustomizerFileModel',
            )
        );
    }
    
    public function getPluginName()
    {
        return 'Customizer';
    }
    
    public function getPluginDescription()
    {
        return t('Completely customize your Kanboard experience with logos, favicons & themes.');
    }
    
    public function getPluginAuthor()
    {
        return 'Craig Crosby';
    }
    
    public function getPluginVersion()
    {
        return '1.7.0';
    }
    
    public function getPluginHomepage()
    {
        return 'https://github.com/creecros/Customizer';
    }
    
    public function getCompatibleVersion()
    {
        return '>=1.0.42';
    }
}
