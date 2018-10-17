<li <?= $this->app->checkMenuSelection('ConfigController', 'application') ?>>
    <?= $this->url->link(t('Customizer'), 'CustomizerFileController', 'show', ['plugin' => 'Customizer']) ?>
</li>
