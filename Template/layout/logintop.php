<?php global $loginCheck; ?>
<?php if ($loginCheck): ?>
<style>
body {background-image: $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer'));}
</style>
<?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="50">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
<?php endif ?>
