<?php global $loginCheck; ?>
<?php if ($loginCheck): ?>
<body background="<?= $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) ?>">
<?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="50">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
<?php endif ?>
