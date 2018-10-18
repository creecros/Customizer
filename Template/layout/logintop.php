<?php if (null !== $this->task->customizerFileModel->getByType(1)) : ?>

<div id="login-top">
	<?php if ($this->task->configModel->exists('login_link')): ?><a href="<?php echo $this->configModel->getOptions('login_link', 'https://kanboard.org'); ?>" target="_blank"><?php endif ?>
		<img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(1))) ?>" height="50">
	<?php if ($this->task->configModel->exists('login_link')): ?></a><?php endif ?>
</div>

<?php endif ?>
