<li <?= $this->app->checkMenuSelection('ConfigController', 'application') ?>>
    <?= $this->url->link(t('Application Images'), 'CustomizerController', 'config', ['plugin' => 'Customizer']) ?>
</li>
