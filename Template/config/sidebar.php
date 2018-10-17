<li <?= $this->app->checkMenuSelection('ConfigController', 'application') ?>>
    <?= $this->url->link(t('Application Images'), 'CustomizerFileController', 'show', ['plugin' => 'Customizer']) ?>
</li>
