<li <?= $this->app->checkMenuSelection('CustomizerFileController', 'show') ?>>
    <?= $this->url->link(t('Customizer'), 'CustomizerFileController', 'show', ['plugin' => 'Customizer']) ?>
</li>
