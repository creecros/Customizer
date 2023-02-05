<h1>
    <?php if (null !== $this->task->customizerFileModel->getByType(1)) : ?>
    <span class="logo">
      <a href="<?= $this->url->href('DashboardController', 'show', array(), false, '', t('Dashboard')) ?>" title="<?= t('Dashboard') ?>">
        <img src="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(1))) ?>" height="<?= $this->task->configModel->get('headerlogo_size', '30') ?>">
      </a>
    </span>
    <?php else: ?>
    <span class="logo">
        <?= $this->url->link('K<span>B</span>', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
    </span>    
    <?php endif ?>

    <span class="title">
        <?php if (! empty($project) && ! empty($task)): ?>
            <?= $this->url->link($this->text->e($project['name']), 'BoardViewController', 'show', array('project_id' => $project['id'])) ?>
        <?php else: ?>
            <?= $this->text->e($title) ?>
        <?php endif ?>
    </span>
    <?php if (! empty($description)): ?>
        <?= $this->app->tooltipHTML($description) ?>
    <?php endif ?>
</h1>
