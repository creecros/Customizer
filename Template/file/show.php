<?php global $customizer; ?>
<section>
    <div class="page-header">
        <h2><?= t('Assets') ?></h2>
    </div>
    <div class="panel header-logo-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Header') ?></h3>
    	</div>
        <img src="<?= $this->url->href('CustomizerFileController', 'logo', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>" height="<?= $this->task->configModel->get('headerlogo_size', '30') ?>">
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
    </div>    
        <div class="panel login-logo-panel">
        	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Login') ?></h3>
    	</div>
        <img src="<?= $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer', 'file_id' => $loginlogo['id'])) ?>" alt="<?= $this->text->e($loginlogo['name']) ?>" height="<?= $this->task->configModel->get('loginlogo_size', '50') ?>">
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
    </div>    
    <div class="panel favicon-panel">
    	<div class="panel-heading">
    		<h3 class="panel-title"><?= t('Favicon') ?></h3>
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
    <form class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'save', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <fieldset class="login-link-block">
    	<div class="panel-heading">
    		<h3 class="panel-title links-title"><?= t('Links & Settings') ?></h3>
    	</div>
        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help login-link-desc"><?= e('Example: <code>https://example.kanboard.org/</code> (used as logo link on login page)') ?></p>
        <?= $this->form->label(t('Login Page Background Color'), 'loginbackground_color') ?>
        <input type="color" name="loginbackground_color" value="<?= $this->task->configModel->get('loginbackground_color','#ffffff') ?>">
        <p class="form-help background-img-link-desc"><?= e('Default is White') ?></p>
        <?= $this->form->label(t('Login Panel Color'), 'loginpanel_color') ?>
        <input type="color" name="loginpanel_color" value="<?= $this->task->configModel->get('loginpanel_color','#ffffff') ?>">
        <p class="form-help background-img-link-desc"><?= e('Default is White') ?></p>
        <?= $this->form->label(t('Login Background Image URL'), 'background_url') ?>
        <?= $this->form->text('background_url', $values, $errors, array('placeholder="https://source.unsplash.com/random"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>https://source.unsplash.com/random</code> (URL for a background image on the login page, centered, autoscale, no-repeat)') ?></p>
        <?= $this->form->label(t('Header Logo Size'), 'headerlogo_size') ?>
        <?= $this->form->text('headerlogo_size', $values, $errors, array('placeholder="30"', 'pattern="[0-9]{1,3}"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>30</code> (Default is 30px in height, intgers only, max 999)') ?></p>
        <?= $this->form->label(t('Login Logo Size'), 'loginlogo_size') ?>
        <?= $this->form->text('loginlogo_size', $values, $errors, array('placeholder="50"', 'pattern="[0-9]{1,3}"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>50</code> (Default is 50px in height, intgers only, max 999)') ?></p>
        <?= $this->form->label(t('Theme'), 'themeSelection') ?>
        <?= $this->form->select('themeSelection', $customizer['themes'], $values, $errors) ?>  
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>     
<br>
</section>
