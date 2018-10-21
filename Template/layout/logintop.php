<?php global $loginCheck; ?>
<?php if ($loginCheck): ?>
<?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="50">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
<?php endif ?>
<style>
body  {
    background-image: url("https://source.unsplash.com/random");
    background-size:     cover;                   
    background-repeat:   no-repeat;
}
</style>
