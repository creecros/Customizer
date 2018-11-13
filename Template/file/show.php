<?php 
global $customizer; 
?>
<div class="sidebar-content">
    <form class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'save', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <fieldset class="login-link-block panel">

    	<button type="button" class="login-accordion"><?= t('Image Assets & Settings') ?></button>
        <div class="login-accordian-panel-active mt-20">
        <div class="panel header-logo-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Header Image') ?></h3>
    	</div>
        <img id="hl1" src="<?= $this->url->href('CustomizerFileController', 'logo', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>" height="<?= $this->task->configModel->get('headerlogo_size', '30') ?>">
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
                <th><input type="range" name="headerlogo_size" min="20" max="100" value="<?= $this->task->configModel->get('headerlogo_size','30') ?>">
                    <header_logo_output> <?= $this->task->configModel->get('headerlogo_size','30') ?></header_logo_output><?= t('&nbsp;pixels high') ?>
                </th>
            </tr>
        </table>
            
    </div>    

        <div class="panel login-logo-panel">
        	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Login Image') ?></h3>
    	</div>
     
        <img id="ll1" src="<?= $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer', 'file_id' => $loginlogo['id'])) ?>" alt="<?= $this->text->e($loginlogo['name']) ?>" height="<?= $this->task->configModel->get('loginlogo_size', '50') ?>">
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
                <th><input type="range" name="loginlogo_size" min="20" max="100" value="<?= $this->task->configModel->get('loginlogo_size','50') ?>">
                    <login_logo_output><?= $this->task->configModel->get('loginlogo_size','50') ?></login_logo_output><?= t('&nbsp;pixels high') ?>
                </th>
            </tr>
        </table>
           
    </div>    
 
    <div class="panel favicon-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Favicon Image') ?></h3>
    	</div>
      
        <img src="<?= $this->url->href('CustomizerFileController', 'icon', array('plugin' => 'customizer', 'file_id' => $flavicon['id'])) ?>" alt="<?= $this->text->e($flavicon['name']) ?>" height="16">
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
        </div>
        
        <button type="button" class="login-accordion"><?= t('Login Page Settings') ?></button>
        <div class="login-accordian-panel mt-20">
            
        <table>
            <tr>
                <th width="25%"><strong><?= t('Use Custom Login Settings') ?></strong></th>
                <th>
                    <label class="switch">
                    <input name="use_custom_login" type="checkbox">
                    <span class="slider round"></span>
                    </label>
                </th>
            </tr>
        </table>
            

        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help login-link-desc"><?= e('Example: <code>https://example.kanboard.org/</code> (used as logo link on login page)') ?></p>
        <?= $this->form->label(t('Login Background Image URL'), 'background_url') ?>
        <?= $this->form->text('background_url', $values, $errors, array('placeholder="https://source.unsplash.com/random"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>https://source.unsplash.com/random</code> (URL for a background image on the login page, centered, autoscale, no-repeat)') ?></p>
        <div class="column-100">
                <table>
                    <tr>
                        <th>
                          <strong><?= t('Login Page Background Color') ?></strong>
                        </th>
                        <th>
                          <input class="color" name="loginbackground_color" value="<?= $this->task->configModel->get('loginbackground_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Shadow Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_shadow_color" value="<?= $this->task->configModel->get('login_shadow_color','#333') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Border Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_border_color" value="<?= $this->task->configModel->get('login_border_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Border Thickness') ?></strong>
                        </th>
                        <th>
                            <input type="range" name="login_border" min="0" max="10" value="<?= $this->task->configModel->get('login_border','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="loginpanel_color" value="<?= $this->task->configModel->get('loginpanel_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Panel Shadow Intensity') ?></strong>
                        </th>
                        <th>
                            <input type="range" name="login_shadow" min="0" max="20" value="<?= $this->task->configModel->get('login_shadow','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Background Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_btn_color" value="<?= $this->task->configModel->get('login_btn_color','#3079ed') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shadow Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_btn_shadow_color" value="<?= $this->task->configModel->get('login_btn_shadow_color','#333') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Border Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_btn_border_color" value="<?= $this->task->configModel->get('login_btn_border_color','transparent') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shade Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_btn_shade_color" value="<?= $this->task->configModel->get('login_btn_shade_color','transparent') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Font Color') ?></strong>
                        </th>
                        <th>
                            <input class="color" name="login_btn_font_color" value="<?= $this->task->configModel->get('login_btn_font_color','#ffffff') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Shadow Intensity') ?></strong>
                        </th>
                        <th>
                            <input type="range" name="login_btn_shadow" min="0" max="20" value="<?= $this->task->configModel->get('login_btn_shadow','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Border Thickness') ?></strong>
                        </th>
                        <th>
                            <input type="range" name="login_btn_border" min="0" max="10" value="<?= $this->task->configModel->get('login_btn_border','0') ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <strong><?= t('Login Button Width') ?></strong>
                        </th>
                        <th>
                            <input type="range" name="login_btn_width" min="95" max="300" value="<?= $this->task->configModel->get('login_btn_width','95') ?>">
                        </th>
                    </tr>
                </table>  
        <p class="alert" style="max-width: 1000px;"><?= t('You can see a preview only after saving') ?> <button type="submit" class="btn btn-blue" style="float: right;margin-top: -6px;"><?= t('Save') ?></button></p>
        <div class="panel" id="preview" style="background: url('<?= $customizer['backURL'] ?>') no-repeat center center;height: 700px;max-width: 1000px;background-color: <?= $customizer['backColor'] ?>;">
            <div>
                <p style="color: #f5f5f5;"><?= t('Preview') ?></p>
            </div>
            <div class="form-login" style="
            margin-bottom:20px;
            background-color: <?= $customizer['loginpanel_color'] ?>;
            -webkit-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
            -moz-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
            box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
            padding: 10px;
            border: <?= $customizer['login_border'] ?>px solid <?= $customizer['login_border_color'] ?>;
            border-radius: 5px;
            text-align: center;
            ">
                    <?php if ($customizer['loginCheck']): ?>
                    <?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="' . $customizer['logoSize'] . '">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
                    <?php else: ?>
                    <?= $this->url->link('K<span>B</span>', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
                    <?php endif ?>
    
                    <label for="form-username"></label>        
                    <input type="text" name="username" placeholder="<?= t('Username') ?>" >
                    <span class="form-required"></span>
                    <label for="form-password"></label>        
                    <input type="password" name="password" placeholder="<?= t('Password') ?>" >
                    <span class="form-required"></span>
                    <label><input type="checkbox" name="remember_me" value="1" checked="checked" disabled>&nbsp; <?= t('Remember Me') ?></label> 
                    <div style="margin-bottom: 10px !important;"></div>
                    <div class="form-actions" style="text-align: center;padding-top: unset;padding-bottom: 10px;">
                        <button type="button" class="btn login-btn" style="
                        width: <?= $customizer['login_btn_width'] ?>px;
                        -webkit-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
                        -moz-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
                        box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
                        border: <?= $customizer['login_btn_border'] ?>px solid <?= $customizer['login_btn_border_color'] ?>;
                        background: <?= $customizer['login_btn_color'] ?>;
                        color: <?= $customizer['login_btn_font_color'] ?>;
                        background-image: linear-gradient(-180deg, <?= $customizer['login_btn_color'] ?> 0%, <?= $customizer['login_btn_shade_color'] ?> 90%);
                        border-radius: 5px;
                        "><?= t('Sign in') ?></button>
                    </div>
            </div> 
        </div>
        </div>
        </div>
        <?= $this->form->label(t('Theme'), 'themeSelection') ?>
        <?= $this->helper->themeHelper->reverseSelect('themeSelection', $customizer['themes'], $values, $errors) ?>  
    </fieldset>

    <div class="form-actions" style="margin-bottom: 50px">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>     
</div>
