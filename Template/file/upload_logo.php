<div class="page-header">
    <h2><?= t('Header Logo') ?></h2>
        <br>
    <?= t('Recommend 100 pixels in width, *.png, *.jpg, *.gif, max size 500kb.') ?>
</div>

<?= $this->app->component('file-upload', array(
    'maxSize'           => 500000,
    'url'               => $this->url->to('CustomizerFileController', 'save', array('plugin' => 'customizer', 'custom_id' => 1)),
    'labelDropzone'     => t('Drag and drop your file here'),
    'labelOr'           => t('or'),
    'labelChooseFiles'  => t('choose file'),
    'labelOversize'     => t('The maximum allowed file size is %sB.', $this->text->bytes(500000)),
    'labelSuccess'      => t('File has been uploaded successfully.'),
    'labelCloseSuccess' => t('Close this window'),
    'labelUploadError'  => t('Unable to upload this file.'),
)) ?>

<?= $this->modal->submitButtons(array(
   'submitLabel' => t('Upload Header Logo'),
   'disabled'    => true,
)) ?>
