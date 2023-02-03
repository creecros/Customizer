
<?php if (! empty($task['owner_id'])): ?>
<div class="task-board-avatars">
    <span
        <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
        class="task-board-assignee task-board-change-assignee"
        data-url="<?= $this->url->href('TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>">
    <?php else: ?>
        class="task-board-assignee">
    <?php endif ?>
        <?= $this->helper->dynamicAvatar->boardDynamic(
            $task['owner_id'],
            $task['assignee_username'],
            $task['assignee_name'],
            $task['assignee_email'],
            $task['assignee_avatar_path'],
            'avatar-inline',
            $this->task->configModel->get('b_av_size', '20')
        ) ?>
    </span>
</div>
<?php endif ?>
<style>
.avatar-bdyn img, .avatar-bdyn div {border-radius: <?= $this->task->configModel->get('b_av_radius', '50') ?>%}
.avatar-bdyn .avatar-letter {line-height:<?= $this->task->configModel->get('b_av_size', '20') ?>px;width:<?= $this->task->configModel->get('b_av_size', '20') ?>px;font-size:<?= $this->task->configModel->get('b_av_size', '20') / 2 ?>px;}
</style>
