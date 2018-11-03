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
		'Default' => '',
		'Github' => 'plugins/Customizer/Assets/css/github.css',
		'Galaxy' => 'plugins/Customizer/Assets/css/galaxy.css',
		'Breathe' => 'plugins/Customizer/Assets/css/breathe.css'
		);
	    
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
	    
	    
        //Templates and Assets
        $this->template->hook->attach('template:config:sidebar', 'customizer:config/sidebar');
        $this->template->setTemplateOverride('header/title', 'customizer:header/title');
        $this->template->setTemplateOverride('layout', 'customizer:layout/layout');
        $this->template->setTemplateOverride('auth/index', 'customizer:layout/index');
        $this->template->hook->attach('template:auth:login-form:before', 'customizer:layout/logintop');
        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Template/customizer.css'));
	    
        //Routes
        $this->route->addRoute('settings/customizer', 'CustomizerFileController', 'show', 'Customizer');
	    
	//Permissions for login page to access logos    
        $this->applicationAccessMap->add('CustomizerFileController', array('image', 'loginlogo', 'logo', 'link', 'logoexists', 'linkexists'), Role::APP_PUBLIC);
	    
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
        return t('Add Logo and Flavicon');
    }
    
    public function getPluginAuthor()
    {
        return 'Craig Crosby';
    }
    
    public function getPluginVersion()
    {
        return '0.0.7';
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
