<?php 
global $customizer; 
$plugin_folder = basename(PLUGINS_DIR);
?>

<?= $this->hook->render('customizer:config:style') ?>

<div class="sidebar-content">
    <form name="settings" id="settings" class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'save', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <fieldset class="login-link-block panel">

    	<button type="button" class="login-accordion"><i class="fa fa-picture-o" aria-hidden="true"></i> <?= t('Image Assets & Settings') ?></button>
        <div class="login-accordian-panel mt-10">
        <div class="panel header-logo-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Header Image') ?></h3>
    	</div>
        <img id="hl1" src="<?= $this->url->href('CustomizerFileController', 'logo_setting', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>" height="<?= $this->task->configModel->get('headerlogo_size', '30') ?>">
    <br>
    <br>
     <ul class="upload-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('file', t('Upload Header Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 1))?>
    </ul class="remove-link">
    <?php if (null !== $this->task->customizerFileModel->getByType(1)) : ?>
    <ul class="remove-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Header Logo'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 1, 'file_id' => $logo['id']))?>
    </ul>
    <?php endif ?>
    <br><br>
        <table>
            <tr>
                <th width="25%"><strong><?= t('Header Logo Size') ?></strong></th>
                <th><input type="range" name="headerlogo_size" min="20" max="250" value="<?= $this->task->configModel->get('headerlogo_size','30') ?>">
                    <header_logo_output> <?= $this->task->configModel->get('headerlogo_size','30') ?></header_logo_output><?= t('&nbsp;pixels high') ?>
                </th>
            </tr>
        </table>
            
    </div>    

        <div class="panel login-logo-panel">
        	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Login Image') ?></h3>
    	</div>
     
        <img id="ll1" src="<?= $this->url->href('CustomizerFileController', 'loginlogo_setting', array('plugin' => 'customizer', 'file_id' => $loginlogo['id'])) ?>" alt="<?= $this->text->e($loginlogo['name']) ?>" height="<?= $this->task->configModel->get('loginlogo_size', '50') ?>">
    <br>
    <br>
     <ul class="upload-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('file', t('Upload Login Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 3))?>
    </ul>
    <?php if (null !== $this->task->customizerFileModel->getByType(3)) : ?>
    <ul class="remove-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Login Logo'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 3, 'file_id' => $loginlogo['id']))?>
    </ul>
    <?php endif ?>
    <br><br>
        <table>
            <tr> 
                <th width="25%"><strong><?= t('Login Logo Size') ?></strong></th>
                <th><input type="range" name="loginlogo_size" min="20" max="500" value="<?= $this->task->configModel->get('loginlogo_size','50') ?>">
                    <login_logo_output><?= $this->task->configModel->get('loginlogo_size','50') ?></login_logo_output><?= t('&nbsp;pixels high') ?>
                </th>
            </tr>
        </table>
           
    </div>    
 
    <div class="panel favicon-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Favicon Image') ?></h3>
    	</div>
      
        <img src="<?= $this->url->href('CustomizerFileController', 'icon_setting', array('plugin' => 'customizer', 'file_id' => $flavicon['id'])) ?>" alt="<?= $this->text->e($flavicon['name']) ?>" height="16">
    <br>
    <br>
     <ul class="upload-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <?= $this->modal->medium('file', t('Upload Favicon'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 2))?>
      </ul>
    </ul>
    <?php if (null !== $this->task->customizerFileModel->getByType(2)) : ?>
    <ul class="remove-link">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Favicon'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 2, 'file_id' => $flavicon['id']))?>
    </ul>
    <?php endif ?>
    </div>

        <div class="panel avatar-sizing-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Header Avatar Icon') ?></h3>
    	</div>
        <?= $this->helper->dynamicAvatar->currentUserDynamic('avatar-preview') ?>
    <br>
    <br>
        <table>
            <tr>
                <th width="25%"><strong><?= t('Header Avatar Icon Size') ?></strong></th>
                <th><input type="range" name="av_size" id="av_size" min="20" max="50" value="<?= $this->task->configModel->get('av_size','20') ?>">
                    <av_icon_output> <?= $this->task->configModel->get('av_size','20') ?></av_icon_output><?= t('&nbsp;pixels') ?>
                </th>
            </tr>            
            <tr>
                <th width="25%"><strong><?= t('Header Avatar Icon Radius') ?></strong></th>
                <th><input type="range" name="av_radius" id="av_radius" min="0" max="50" value="<?= $this->task->configModel->get('av_radius','50') ?>">
                    <av_radius_output> <?= $this->task->configModel->get('av_radius','50') ?></av_radius_output><?= t('&nbsp;percent') ?>
                </th>
            </tr>
        </table>
            
    </div>    

        <div class="panel b-avatar-sizing-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Task Board Avatar Icon') ?></h3>
    	</div>
        <?= $this->helper->dynamicAvatar->boardCurrentUserDynamic('b-avatar-preview') ?>
    <br>
    <br>
        <table>
            <tr>
                <th width="25%"><strong><?= t('Avatar Icon Size') ?></strong></th>
                <th><input type="range" name="b_av_size" id="b_av_size" min="20" max="50" value="<?= $this->task->configModel->get('b_av_size','20') ?>">
                    <b_av_icon_output> <?= $this->task->configModel->get('b_av_size','20') ?></b_av_icon_output><?= t('&nbsp;pixels') ?>
                </th>
            </tr>            
            <tr>
                <th width="25%"><strong><?= t('Avatar Icon Radius') ?></strong></th>
                <th><input type="range" name="b_av_radius" id="b_av_radius" min="0" max="50" value="<?= $this->task->configModel->get('b_av_radius','50') ?>">
                    <b_av_radius_output> <?= $this->task->configModel->get('b_av_radius','50') ?></b_av_radius_output><?= t('&nbsp;percent') ?>
                </th>
            </tr>
        </table>
            
    </div>    
<style>
.avatar-bdyn img, .avatar-bdyn div {border-radius: <?= $this->task->configModel->get('b_av_radius', '50') ?>%}
.avatar-bdyn .avatar-letter {line-height:<?= $this->task->configModel->get('b_av_size', '20') ?>px;width:<?= $this->task->configModel->get('b_av_size', '20') ?>px;font-size:<?= $this->task->configModel->get('b_av_size', '20') / 2 ?>px;}
</style>
        
        
        <table>
            <tr>
                <th width="25%"><strong><?= t('Enable Cache') ?></strong>
                        <p class="form-help enable-cache-desc"><?= e('Once enabled, site assets will begin to be cached for 5 days, increasing speed of site. However, you will need to clear your cache to see any new images uploaded. The settings page, will be unaffected by this setting.') ?></p>
                </th>
                <th>
                    <label class="switch">
                    <input id="toggle" name="enable_cache" type="checkbox" value="checked" <?= $this->task->configModel->get('enable_cache','') ?>>
                    <span class="slider round"></span>
                    </label>
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <th width="25%"><strong><?= t('Logo Generator') ?></strong>
                   <p class="form-help enable-cache-desc"><?= e('Experimental Tool, to create simple logos for those in need.') ?></p>
                </th>
                <th>
                    <a href="https://creecros.github.io/simple_logo_gen/">
                        <img border="0" alt="logo_gen" src="/<?= $plugin_folder ?>/Customizer/Assets/img/logo-gen.png">
                    </a>
                </th>
        </table>
        <div class="form-actions mb-20 ml-15">
                <button type="submit" name="save" value="save" class="btn btn-blue"><?= t('Save') ?></button>
            </div>
    </div>
        
        <button type="button" class="login-accordion"><i class="fa fa-sign-in" aria-hidden="true"></i> <?= t('Login Page Settings') ?></button>
        <?php if ($this->task->configModel->get('use_custom_login', '') == 'checked') : ?>
                <div class="login-accordian-panel mt-10">
        <?php else :?>
                <div class="login-accordian-panel mt-10">
        <?php endif ?>
        <table>
            <tr>
                <th width="25%"><strong><?= t('Use Custom Login Settings') ?></strong></th>
                <th>
                    <label class="switch">
                    <input id="toggle" name="use_custom_login" type="checkbox" value="checked" <?= $this->task->configModel->get('use_custom_login','') ?>>
                    <span class="slider round"></span>
                    </label>
                </th>
            </tr>
        </table>
            
        <?php if ($this->task->configModel->get('use_custom_login', '') == 'checked') : ?>
        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help login-link-desc"><?= e('Example: <code class="examples">https://example.kanboard.org/</code> (used as logo link on login page)') ?></p>
        <?= $this->form->label(t('Login Background Image URL'), 'background_url') ?>
        <?= $this->form->text('background_url', $values, $errors, array('placeholder="https://source.unsplash.com/random"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code class="examples">https://source.unsplash.com/random</code> (URL for a background image on the login page, centered, autoscale, no-repeat)') ?></p>
        <?= $this->form->label(t('Login page note'), 'login_note') ?>
        <?= $this->form->textarea('login_note', $values, $errors, array('placeholder="Welcome to Kanboard!"')) ?>
        <p class="form-help login-note-desc"><?= e('Hint: Use HTML formatting to customize your note further.') ?></p>
        <div class="column-100">
                <table>
                    <tr>
                        <th>
                          <strong><?= t('Login Page Background Color') ?></strong>
                        </th>
                        <th>
                          <input id="loginbackground_color" class="color" name="loginbackground_color" value="<?= $this->task->configModel->get('loginbackground_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Shadow Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_shadow_color" class="color" name="login_shadow_color" value="<?= $this->task->configModel->get('login_shadow_color','#333') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Border Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_border_color" class="color" name="login_border_color" value="<?= $this->task->configModel->get('login_border_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Border Thickness') ?></strong>
                        </th>
                        <th>
                            <input id="login_border" type="range" name="login_border" min="0" max="10" value="<?= $this->task->configModel->get('login_border','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Color') ?></strong>
                        </th>
                        <th>
                            <input id="loginpanel_color" class="color" name="loginpanel_color" value="<?= $this->task->configModel->get('loginpanel_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Shadow Intensity') ?></strong>
                        </th>
                        <th>
                            <input id="login_shadow" type="range" name="login_shadow" min="0" max="20" value="<?= $this->task->configModel->get('login_shadow','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Background Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_color" class="color" name="login_btn_color" value="<?= $this->task->configModel->get('login_btn_color','#3079ed') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shadow Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_shadow_color" class="color" name="login_btn_shadow_color" value="<?= $this->task->configModel->get('login_btn_shadow_color','#333') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Border Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_border_color" class="color" name="login_btn_border_color" value="<?= $this->task->configModel->get('login_btn_border_color','transparent') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shade Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_shade_color" class="color" name="login_btn_shade_color" value="<?= $this->task->configModel->get('login_btn_shade_color','transparent') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Font Color') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_font_color" class="color" name="login_btn_font_color" value="<?= $this->task->configModel->get('login_btn_font_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shadow Intensity') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_shadow" type="range" name="login_btn_shadow" min="0" max="20" value="<?= $this->task->configModel->get('login_btn_shadow','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Border Thickness') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_border" type="range" name="login_btn_border" min="0" max="10" value="<?= $this->task->configModel->get('login_btn_border','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Width') ?></strong>
                        </th>
                        <th>
                            <input id="login_btn_width" type="range" name="login_btn_width" min="95" max="300" value="<?= $this->task->configModel->get('login_btn_width','95') ?>">
                        </th>
                    </tr>
                </table>  
        <p class="alert" style="max-width: 1000px;"><?= t('Changes must be saved in order to take effect.') ?> <button type="submit" name="save" value="save" class="btn btn-blue" style="float: right;margin-top: -6px;"><?= t('Save') ?></button></p>
        <div class="panel" id="preview" style="background: url('<?= $customizer['backURL'] ?>') no-repeat center center;background-size: cover;height: 700px;max-width: 1000px;background-color: <?= $customizer['backColor'] ?>;">
            <div>
                <p style="color: #f5f5f5;"><?= t('Preview') ?></p>
            </div>
            <div id="preview-form-login" class="preview-form-login">
                    <?php if ($customizer['loginCheck']): ?>
                    <?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo_setting', array('plugin' => 'customizer')) .  '" height="' . $customizer['logoSize'] . '">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
                    <?php else: ?>
                    <?= $this->url->link('K<span>B</span>', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
                    <?php endif ?>
    
                    <label for="form-username"></label>        
                    <input type="text" name="username" placeholder="<?= t('Enter your username') ?>" style="
                        border-radius: 5px;
                    ">
                    <span class="preview-form-required"></span>
                    <label for="form-password"></label>        
                    <input type="password" name="password" placeholder="<?= t('Enter your password') ?>" style="
                        border-radius: 5px;
                    ">
                    <span class="preview-form-required"></span>
                    <label style="color:grey"><input type="checkbox" name="remember_me" value="1" checked="checked" disabled>&nbsp; <?= t('Remember Me') ?></label> 
                    <div style="margin-bottom: 10px !important;"></div>
                    <div class="preview-form-actions">
                        <button type="button" id="preview-login-btn" class="btn preview-login-btn"><?= t('Sign in') ?></button>
                    </div>
                <?php if ($this->app->config('password_reset') == 1): ?>
                    <div class="reset-password">
                        <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create') ?>
                    </div>
                <?php endif ?>
            </div> 
            <div id="preview-form-note" class="preview-form-note">
                <div class="login-note">
                    <?= $customizer['login_note'] ?>
                </div>
            </div>
        </div>
        </div>
        <?php endif ?>
        </div>
        <button type="button" class="login-accordion"><i class="fa fa-refresh" aria-hidden="true"></i> <?= t('Manage Themes') ?></button>
        <div class="login-accordian-panel mt-10">
            <div class="panel header-logo-panel">
            <h3 class="panel-title"><?= t('Global Themes') ?></h3>
            <?= $this->form->label(t('Theme'), 'themeSelection') ?>
            <?= $this->helper->themeHelper->reverseSelect('themeSelection', $customizer['themes'], $values, $errors) ?>  
            <p class="form-help theme-select"><?= e('This will be the theme selection for all users who have not chosen their own theme.') ?></p>
            <div class="form-actions" style="margin-bottom: 50px">
                <button type="submit" name="save" value="save" class="btn btn-blue"><?= t('Save') ?> </button><button type="submit" name="remove" value="remove" class="btn btn-red"><?= t('Remove') ?></button>
            </div>
            </div>
            </form> 

            <form method="post" enctype="multipart/form-data" action="<?= $this->url->href('CustomizerConfigController', 'uploadcss', array('plugin' => 'customizer')) ?>">
            <div class="panel header-logo-panel">
    	        <h3 class="panel-title"><?= t('Upload a theme') ?></h3>
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <input type="submit" class="btn btn-blue" value="<?= t('Add Theme') ?>" name="submit">
            </div>
            </form>
            <form method="post" enctype="multipart/form-data" action="<?= $this->url->href('CustomizerConfigController', 'resetUserThemes', array('plugin' => 'customizer')) ?>">
            <div class="panel header-logo-panel">
    	        <h3 class="panel-title"><?= t('Users themes option') ?></h3>
                    <input type="submit" class="btn btn-red" value="<?= t('Reset All Users Themes') ?>" name="submit">
            </div>
            </form>
            <form method="post" enctype="multipart/form-data" action="<?= $this->url->href('CustomizerConfigController', 'enableDisableThemes', array('plugin' => 'customizer')) ?>">
            <div class="panel header-logo-panel">
    	        <h3 class="panel-title"><?= t('Toggle Users themes') ?></h3>
    	        <?php if ($this->task->configModel->get('toggle_user_themes', 'disable') == 'disable') : ?>
                    <input type="submit" class="btn btn-blue" value="<?= t('Enable Users Themes') ?>" name="submit">
                <?php else :?>
                    <input type="submit" class="btn btn-red" value="<?= t('Disable Users Themes') ?>" name="submit">
                <?php endif ?>
            </div>
            </form>
            
            
        </div>
         
            <button type="button" class="login-accordion"><i class="fa fa-magic" aria-hidden="true"></i> <?= t('Theme Creator') ?></button>
            <div class="login-accordian-panel mt-10">
                <?= $this->hook->render('customizer:config:themecreator') ?>
            </div>
        </div>
</fieldset>
