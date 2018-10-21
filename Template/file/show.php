<?php global $backURL; ?>
<section>
    <div class="page-header">
        <h3><?= t('Assets') ?></h3>
    </div>
    <div class="panel">
        <img src="<?= $this->url->href('CustomizerFileController', 'logo', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>" height="100">
    <br>
    <br>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('file', t('Upload Header Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 1))?>
    </ul>
    <?php if (null !== $this->task->customizerFileModel->getByType(1)) : ?>
    <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Header Logo'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 1, 'file_id' => $logo['id']))?>
    </ul>
    <?php endif ?>
    </div>    
    <br> 
        <div class="panel">
        <img src="<?= $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer', 'file_id' => $loginlogo['id'])) ?>" alt="<?= $this->text->e($loginlogo['name']) ?>" height="75">
    <br>
    <br>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('file', t('Upload Login Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 3))?>
    </ul>
    <?php if (null !== $this->task->customizerFileModel->getByType(3)) : ?>
    <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Login Logo'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 3, 'file_id' => $loginlogo['id']))?>
    </ul>
    <?php endif ?>
    </div>    
    <br> 
    <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?php $backURL = $this->task->configModel->get('background_url', '') ?>
    <fieldset>
        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help"><?= t('Example: https://example.kanboard.org/ (used as logo link on login page)') ?></p>
        <?= $this->form->label(t('Login Background Image URL'), 'background_url') ?>
        <?= $this->form->text('background_url', $values, $errors, array('placeholder="https://source.unsplash.com/random"')) ?>
        <p class="form-help"><?= t('Example: https://source.unsplash.com/random (URL for a background image on the login page, centered, autoscale, no-repeat)') ?></p>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>     
<br>
    <div class="panel">
        <img src="<?= $this->url->href('CustomizerFileController', 'icon', array('plugin' => 'customizer', 'file_id' => $flavicon['id'])) ?>" alt="<?= $this->text->e($flavicon['name']) ?>" height="50">
    <br>
    <br>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <?= $this->modal->medium('file', t('Upload Favicon'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 2))?>
      </ul>
    </ul>
    <?php if (null !== $this->task->customizerFileModel->getByType(2)) : ?>
    <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('remove', t('Remove Favicon'), 'CustomizerFileController', 'confirm', array('plugin' => 'customizer', 'custom_id' => 2, 'file_id' => $flavicon['id']))?>
    </ul>
    <?php endif ?>
    </div>
</section>
