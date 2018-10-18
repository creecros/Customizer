<section>
    <div>
        <h3><?= t('Assets') ?></h3>
    </div>
    <div>
        <img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>">
    </div>
    <br>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
                  
    <?= $this->modal->medium('file', t('Upload Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 1))?>
    </ul>
    <br>     
    <form method="post" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'application')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset>
        <?= $this->form->label(t('Login Link'), 'login_link') ?>
        <?= $this->form->text('login_link', $values, $errors, array('placeholder="https://example.kanboard.org/"')) ?>
        <p class="form-help"><?= t('Example: https://example.kanboard.org/ (used as logo link on login page)') ?></p>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>     
<br>
    <div>
        <img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $flavicon['id'])) ?>" alt="<?= $this->text->e($flavicon['name']) ?>">
    </div>
    <br>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <?= $this->modal->medium('file', t('Upload Flavicon'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 2))?>
      </ul>
</section>
