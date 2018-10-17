<section>
    <div>
        <h3><?= t('Assets') ?></h3>
    </div>
    <div>
        <?= $this->render('customizer:file/logo', array('custom_id' => 1, 'image' => $logo)) ?>
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
        <?= $this->render('customizer:file/flavicon', array('custom_id' => 2, 'image' => $flavicon)) ?>
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
