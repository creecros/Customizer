<?php

namespace Kanboard\Plugin\Customizer;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;
use Kanboard\Event\AuthSuccessEvent;
use Kanboard\Core\Security\AuthenticationManager;
use Kanboard\Plugin\Customizer\Model\CustomizerFileModel;

class Plugin extends Base
{
		
    public function initialize()
    {
	global $customizer; 
	
	$plugin_folder = basename(PLUGINS_DIR);

	// Themes
	if (!file_exists($plugin_folder.'/Customizer/Assets/css/userthemes')) { mkdir($plugin_folder.'/Customizer/Assets/css/userthemes', 0755, true); }
	$customizer['themes'] = array(
		'Default' => $plugin_folder.'/Customizer/Assets/css/theme.css'
		);
		
    $scanned_temp_themes = array_diff(scandir($plugin_folder.'/Customizer/Assets/css/userthemes'), array('..', '.'));
	$scanned_preset_themes = array_diff(scandir($plugin_folder.'/Customizer/Assets/css/themes'), array('..', '.'));

	foreach ($scanned_temp_themes as $theme) {
		unlink($plugin_folder.'/Customizer/Assets/css/userthemes/' . $theme);
	}
	    
	if (file_exists(DATA_DIR . '/files/customizer/themes')) {
		$scanned_user_themes = array_diff(scandir(DATA_DIR . '/files/customizer/themes'), array('..', '.'));
		foreach ($scanned_user_themes as $theme) {
		    copy(DATA_DIR . '/files/customizer/themes/' . $theme, $plugin_folder.'/Customizer/Assets/css/userthemes/' . $theme);
			$customizer['themes'][rtrim($theme, '.css')] = $plugin_folder.'/Customizer/Assets/css/userthemes/' . $theme;
		}
	} else { mkdir(DATA_DIR . '/files/customizer/themes', 0755, true); }	
	    
	foreach ($scanned_preset_themes as $theme) {
		$customizer['themes'][rtrim($theme, '.css')] = $plugin_folder.'/Customizer/Assets/css/themes/' . $theme;
	}
      
	    
	    
        //Helper
        $this->helper->register('themeHelper', '\Kanboard\Plugin\Customizer\Helper\ThemeHelper');
        $this->helper->register('dynamicAvatar', '\Kanboard\Plugin\Customizer\Helper\DynamicAvatar');	    
	    
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
	$customizer['login_note'] = $this->configModel->get('login_note', '');
	    
        //Templates and Assets
        $this->template->hook->attach('template:config:sidebar', 'customizer:config/sidebar');
        $this->template->setTemplateOverride('header/title', 'customizer:header/title');
        $this->template->setTemplateOverride('header/user_dropdown', 'customizer:header/user_dropdown');
        $this->template->setTemplateOverride('board/task_avatar', 'customizer:board/task_avatar');
        $this->template->setTemplateOverride('layout', 'customizer:layout/layout');
        $this->template->setTemplateOverride('auth/index', 'customizer:layout/index');
        $this->hook->on('template:layout:css', array('template' => $plugin_folder.'/Customizer/Assets/rgbaColorPicker/rgbaColorPicker.css'));
        $this->hook->on('template:layout:js', array('template' => $plugin_folder.'/Customizer/Assets/rgbaColorPicker/rgbaColorPicker.js'));
        $this->hook->on('template:layout:css', array('template' => $plugin_folder.'/Customizer/Assets/css/customizer.css'));
        $this->hook->on('template:layout:js', array('template' => $plugin_folder.'/Customizer/Assets/js/customizer.js'));
	    $this->template->hook->attach('customizer:config:themecreator', 'customizer:config/themecreator'); 

	if ($customizer['login_note'] != '') {
	    $this->template->hook->attach('template:auth:login-form:newbox', 'customizer:layout/note'); 
	}
	if ($this->configModel->get('toggle_user_themes', 'disable') == 'enable') {
	    $this->template->setTemplateOverride('user_modification/show', 'customizer:user_mod/show');
	}

	 
	if ($this->configModel->get('use_custom_login', '') == 'checked') { 
        	$this->template->hook->attach('customizer:config:style', 'customizer:layout/preview_style');
        	$this->template->hook->attach('template:auth:login-form:before', 'customizer:layout/login_with_custom');
	} else {
        	$this->template->hook->attach('template:auth:login-form:before', 'customizer:layout/login_no_custom');
	}
	    
	//Routes
        $this->route->addRoute('settings/customizer', 'CustomizerFileController', 'show', 'Customizer');
	    
	//Permissions for login page to access logos    
        $this->applicationAccessMap->add('CustomizerFileController', array('image', 'loginlogo', 'logo', 'link', 'logoexists', 'linkexists'), Role::APP_PUBLIC);
	    
	//Get accurate version
        $wasmaster = str_replace('v', '', APP_VERSION);
        $wasmaster = preg_replace('/\s+/', '', $wasmaster);
        
        if (strpos(APP_VERSION, 'master') !== false && file_exists('ChangeLog')) { $wasmaster = trim(file_get_contents('ChangeLog', false, null, 8, 6), ' '); }
        if (version_compare($wasmaster, '1.2.4') >= 0) {
        	$this->template->setTemplateOverride('header/title', 'customizer:header/title');
	} else {
        	$this->template->setTemplateOverride('header/title', 'customizer:header/title_older_kb');
	}
	    
    }
  
    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
        $plugin_folder = basename(PLUGINS_DIR);
        $user_id = $this->customizerFileModel->getUserSessionId();
        $user_theme = $this->userMetadataModel->get($user_id, 'themeSelection', $this->configModel->get('themeSelection', $plugin_folder.'/Customizer/Assets/css/theme.css' ));
        $default_theme = $this->configModel->get('themeSelection', $plugin_folder.'/Customizer/Assets/css/theme.css');
        if ($this->configModel->get('toggle_user_themes', 'disable') == 'enable') {
            $this->hook->on('template:layout:css', array('template' => $user_theme));
        } else {
            $this->hook->on('template:layout:css', array('template' => $default_theme));
        }
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
        return '1.13.7';
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

