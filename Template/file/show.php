<section>
    <div>
        <h3><?= t('Assets') ?></h3>
    </div>
    <div>
        <img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $logo['id'])) ?>" alt="<?= $this->text->e($logo['name']) ?>">
    </div>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <?= $this->modal->medium('file', t('Upload Logo'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 1))?>
      </ul>
    <div>
        <img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $flavicon['id'])) ?>" alt="<?= $this->text->e($flavicon['name']) ?>">
    </div>
     <ul>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <?= $this->modal->medium('file', t('Upload Flavicon'), 'CustomizerFileController', 'create', array('plugin' => 'customizer', 'custom_id' => 2))?>
      </ul>
</section>
