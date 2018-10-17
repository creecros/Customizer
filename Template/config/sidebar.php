<li <?= $this->app->checkMenuSelection('ConfigController', 'customizer') ?>>
    <?= $this->url->link(t('Customizer'), 'CustomizerFileController', 'show', ['plugin' => 'Customizer']) ?>
</li>
