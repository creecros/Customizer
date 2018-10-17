<div class="page-header">
    <h2><?= t('Flavicon') ?></h2>
</div>

<?= $this->app->component('file-upload', array(
    'maxSize'           => $max_size,
    'url'               => $this->url->to('CustomizerFileController', 'save', array('plugin' => 'customizer', 'custom_id' => 2)),
    'labelDropzone'     => t('Drag and drop your file here'),
    'labelOr'           => t('or'),
    'labelChooseFiles'  => t('choose file'),
    'labelOversize'     => t('The maximum allowed file size is %sB.', $this->text->bytes($max_size)),
    'labelSuccess'      => t('File has been uploaded successfully.'),
    'labelCloseSuccess' => t('Close this window'),
    'labelUploadError'  => t('Unable to upload this file.'),
)) ?>

<?= $this->modal->submitButtons(array(
   'submitLabel' => t('Upload Flavicon'),
   'disabled'    => true,
)) ?>
