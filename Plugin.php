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
		'Nebula' => 'https://raw.githubusercontent.com/kenlog/Nebula/master/Assets/css/nebula.css',
		'Moon' => 'https://raw.githubusercontent.com/kenlog/Moon/master/Assets/css/moon.css',
		'Oxygen' => 'https://raw.githubusercontent.com/kenlog/Oxygen/master/Assets/css/oxygen.css',
		'KanboardCSS' => 'https://raw.githubusercontent.com/aljawaid/KanboardCSS/master/kanboardcss.css'
		);
	    
        file_put_contents('/var/www/app/plugins/Customizer/Assets/css/theme.css', fopen($this->configModel->get('themeSelection', ''), 'r'));

        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Assets/css/theme.css'));
	    
        //Helper
        $this->helper->register('themeHelper', '\Kanboard\Plugin\Customizer\Helper\ThemeHelper');
	    
        if (null !== $this->customizerFileModel->getByType(3)) { 
		    $customizer['loginCheck'] = true;
	    } else { 
		    $customizer['loginCheck'] = false;
	    } 
	    
	$customizer['backURL'] = $this->configModel->get('background_url', '');
	$customizer['backColor'] = $this->configModel->get('loginbackground_color', '#ffffff');
	$customizer['logoSize'] = $this->configModel->get('loginlogo_size', '50');
	$customizer['loginpanel_color'] = $this->configModel->get('loginpanel_color', '#ffffff');
        
        $this->template->hook->attach('template:config:sidebar', 'customizer:config/sidebar');
        $this->template->setTemplateOverride('header/title', 'customizer:header/title');
        $this->template->setTemplateOverride('layout', 'customizer:layout/layout');
        $this->template->setTemplateOverride('auth/index', 'customizer:layout/index');
        $this->template->hook->attach('template:auth:login-form:before', 'customizer:layout/logintop');
        $this->route->addRoute('settings/customizer', 'CustomizerFileController', 'show', 'Customizer');
        $this->applicationAccessMap->add('CustomizerFileController', array('loginlogo', 'logo', 'link', 'logoexists', 'linkexists'), Role::APP_PUBLIC);
        $this->hook->on('template:layout:css', array('template' => 'plugins/Customizer/Template/customizer.css'));
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
        return '0.0.6';
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
