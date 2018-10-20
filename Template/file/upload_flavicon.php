<div class="page-header">
    <h2><?= t('Favicon') ?></h2>
    <br>
    <?= t('Recommend 50x50 pixels, *.png only, max size 20kb.') ?>
</div>

<?= $this->app->component('file-upload', array(
    'maxSize'           => 20000,
    'url'               => $this->url->to('CustomizerFileController', 'save', array('plugin' => 'customizer', 'custom_id' => 2)),
    'labelDropzone'     => t('Drag and drop your file here'),
    'labelOr'           => t('or'),
    'labelChooseFiles'  => t('choose file'),
    'labelOversize'     => t('The maximum allowed file size is %sB.', $this->text->bytes(20000)),
    'labelSuccess'      => t('File has been uploaded successfully.'),
    'labelCloseSuccess' => t('Close this window'),
    'labelUploadError'  => t('Unable to upload this file.'),
)) ?>

<?= $this->modal->submitButtons(array(
   'submitLabel' => t('Upload Favicon'),
   'disabled'    => true,
)) ?>
