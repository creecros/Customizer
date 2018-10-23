<?php global $backURL; 
// if ($this->task->configModel->get('headerlogo_size', '30') == '') { $this->task->configModel->save(array('headerlogo_size' => '30')); }
// if ($this->task->configModel->get('loginlogo_size', '50') == '') { $this->task->configModel->save(array('headerlogo_size' => '50')); }
?>
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
    <form class="url-links" method="post" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?php $backURL = $this->task->configModel->get('background_url', '') ?>
    <fieldset class="login-link-block">
    	<div class="panel-heading">
    		<h3 class="panel-title links-title"><?= t('Links') ?></h3>
    	</div>
        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help login-link-desc"><?= e('Example: <code>https://example.kanboard.org/</code> (used as logo link on login page)') ?></p>
        <?= $this->form->label(t('Login Background Image URL'), 'background_url') ?>
        <?= $this->form->text('background_url', $values, $errors, array('placeholder="https://source.unsplash.com/random"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>https://source.unsplash.com/random</code> (URL for a background image on the login page, centered, autoscale, no-repeat)') ?></p>
        <?= $this->form->label(t('Header Logo Size'), 'headerlogo_size') ?>
        <?= $this->form->text('headerlogo_size', $values, $errors, array('placeholder="30"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>30</code> (Default is 30px in height)') ?></p>
        <?= $this->form->label(t('Login Logo Size'), 'loginlogo_size') ?>
        <?= $this->form->text('loginlogo_size', $values, $errors, array('placeholder="50"')) ?>
        <p class="form-help background-img-link-desc"><?= e('Example: <code>50</code> (Default is 50px in height)') ?></p>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>     
<br>
</section>
