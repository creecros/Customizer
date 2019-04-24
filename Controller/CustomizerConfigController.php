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
     if (isset($_POST['remove'])) {
        $values =  $this->request->getValues();
        $this->remove($values['themeSelection']);
     } else {
        
        $values =  $this->request->getValues();
        
        if (array_key_exists('use_custom_login', $values) === false) { $this->configModel->save(['use_custom_login' => '']); }
        if (array_key_exists('enable_cache', $values) === false) { $this->configModel->save(['enable_cache' => '']); }
        
        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

          $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
     }
    }
    
    /**
     * Save user theme
     *
     */
    public function usertheme()
    {
        $user = $this->getUser();
        $values =  $this->request->getValues();
 
        if ($this->userMetadataModel->save($user['id'], $values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

        $this->response->redirect($this->helper->url->to('UserViewController', 'show', array('user_id' => $user['id'])), true);
     
    }
    
    /**
     * Reset all User themes
     *
     */
    public function resetUserThemes()
    {
        $users = $this->userModel->getAll();
        foreach ($users as $user) {
            $this->userMetadataModel->remove($user['id'], 'themeSelection');
        }
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
    
    /**
     * Toggle User themes
     *
     */
    public function enableDisableThemes()
    {
        $status = $this->configModel->get('toggle_user_themes', 'disable');
        
        if ($status == 'disable') { $this->configModel->save(['toggle_user_themes' => 'enable']); } else { $this->configModel->save(['toggle_user_themes' => 'disable']); }
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
    
    
    /**
     * Upload css theme
     *
     */
    public function uploadcss()
    {
        $target_dir = DATA_DIR . '/files/customizer/themes/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            $this->flash->failure(t('Sorry, file already exists.'));
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $this->flash->failure(t('Sorry, your file is too large.'));
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "css") {
            $this->flash->failure(t('Sorry, only CSS files are allowed.'));
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $this->flash->failure(t('Sorry, your file was not uploaded.'));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $this->flash->success(t('Theme file uploaded successfully.'));
            } else {
                $this->flash->failure(t('Sorry, there was an error uploading your file.'));
            }
        }
        
        $this->response->redirect($this->helper->url->to('CustomizerFileController', 'show', array('plugin' => 'Customizer')));
    }
    
    public function remove($file)
    {
        $filename = basename($file);
        if (file_exists(DATA_DIR . '/files/customizer/themes/' . $filename)) { unlink(DATA_DIR . '/files/customizer/themes/' . $filename); }
        unlink($file);
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
             'background-color' => $values['header_background'],
             'background-image' =>  'linear-gradient(-180deg, transparent 0%, '.$values['header_shade'].' 90%)'
            ]
        );
        $css->add_rule(['header h1', 'header a .fa'],
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
                'background' => $values['background_color'],
                'color' => $values['font_main']
            ]
        );
        $css->add_rule(['ul.dropdown-submenu-open', '.accordion-title h3'], 
            [
                'background-color' => $values['background_color']
            ]
        ); 
        $css->add_rule('.dropdown-submenu-open a', 
            [
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
        $css->add_rule(['h1', 'h2', 'h3', '.accordion-toggle'], 
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
        $css->add_rule('.table-list-row .table-list-details strong', 
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
        $css->add_rule(['a:focus', 'a:hover'], 
            [
                'color' => $values['font_link_focus']
            ]
        );
        $css->add_rule(['.table-list-header a:hover', '.table-list-header a:focus', '.task-board a'], 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('.table-list-row .table-list-details', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('.input-addon-field', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule(['.page-header h2 a:focus', '.page-header h2 a:hover', 'code'], 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('.sidebar>ul a', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('.task-list-avatars .task-avatar-assignee', 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule(['.task-list-icons a', '.task-list-icons span', '.task-list-icons i', '.task-date'], 
            [
                'color' => $values['font_secondary']
            ]
        );
        $css->add_rule('span.task-date-overdue', 
            [
                'color' => $values['font_overdue']
            ]
        );
        $css->add_rule('.sidebar>ul li.active', 
            [
                'border-left' => '5px solid '.$values['font_main']
            ]
        ); 
        $css->add_rule(['.sidebar>ul li.active a:focus', '.sidebar>ul li.active a:hover'], 
            [
                'color' => $values['font_secondary']
            ]
        ); 
        $css->add_rule('.sidebar>ul li:hover', 
            [
                'border-left' => '5px solid '.$values['font_secondary']
            ]
        ); 
        $css->add_rule('.panel', 
            [
                'color' => $values['font_main']
            ]
        ); 
        $css->add_rule(['td a.dropdown-menu strong', 'td a.dropdown-menu strong i'],
            [
                'color' => $values['font_main']
            ]
        ); 
        
        $css->add_raw('
        #task-summary h2 {color: unset;}
        .comments .comment:hover {background: #efefef40;}
        .comments .comment:nth-child(even):not(.comment-highlighted):hover {background: #efefef40;}
        .comments .comment:nth-child(even):not(.comment-highlighted) {background: #efefef40;}
        table.table-striped tr:nth-child(odd) {background: #efefef40;}
        header {box-shadow: 0px -1px 5px 1px;border-bottom: none;}
        .project-header {margin-bottom: 8px;margin-top: 8px;}
        .panel{background-color: #efefef40;border: 1px solid #efefef40;}
        .task-board{border-width: 2px;background: #efefef22!important;}
        div.task-board-recent {border-width: 2px;}
        table td {border:none;}
        table th:first-child {border-top-left-radius:8px;}
        table th:last-child {border-top-right-radius:8px;}
        .table-list-header{background:#efefef40;border:1px solid #efefef40;border-radius:5px 5px 0 0;line-height:28px;padding-left:3px;padding-right:3px;}
        .table-list-row{padding-left:3px;padding-right:3px;border-bottom:1px solid #efefef40;border-right:1px solid #efefef40;}
        .table-list-row.table-border-left{border-left:1px solid #efefef40;}
        .table-list-row:nth-child(odd){background:#efefef30;}
        .table-list-row:hover{background:#efefef32;border-bottom:1px solid #efefef32;border-right:1px solid #efefef32;}
        .dropdown-menu-link-icon{text-decoration:none;}
        .dropdown-submenu-open li{border-bottom:1px solid #efefef40;}
        .page-header h2{margin:0;padding:0;font-weight:bold;border-bottom:1px dotted #efefef40;}
        .sidebar>ul li{list-style-type:none;line-height:35px;border-bottom:1px dotted #efefef40;padding-left:13px;}
        span.task-icon-age-total{border:1px solid #efefef40;padding:1px 3px 1px 3px;border-top-left-radius:3px;border-bottom-left-radius:3px;}
        span.task-icon-age-column{border:1px solid #efefef40;border-left:none;margin-left:-5px;padding:1px 3px 1px 3px;border-top-right-radius:3px;border-bottom-right-radius:3px;}
        .subtask-cell{padding:4px 10px;border-top:1px dotted #efefef42;border-left:1px dotted #efefef40;display:table-cell;vertical-align:middle;}
        table th {text-align: left;padding: 0.5em 3px;border:none;background: #efefef40;}
        .views li {white-space: nowrap;background: #efefef40;border:none;border-right: none;padding: 4px 8px;display: inline;}
        ');

                                   
        $minify = true;
        
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
