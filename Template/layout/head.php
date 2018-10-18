<?php if (null !== $this->task->customizerFileModel->getByType(2)) : ?>
        <link rel="icon" type="image/png" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>" sizes="16x16">
<?php else: ?>
        <link rel="icon" type="image/png" href="<?= $this->url->dir() ?>plugins/Themeplus/Img/<?= $themePlusConfig['favicon'] ?>">
<?php endif ?>
