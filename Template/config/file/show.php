<section class="accordion-section <?= empty($files) && empty($images) ? 'accordion-collapsed' : '' ?>">
    <div class="accordion-title">
        <h3><a href="#" class="fa accordion-toggle"></a> <?= t('Assets') ?></h3>
    </div>
    <div class="accordion-content">
        <?= $this->render('customizer:file/logo', array('custom_id' => 1, 'image' => $image)) ?>
        <?= $this->render('customizer:file/flavicon', array('custom_id' => 2, 'image' => $image)) ?>
    </div>
</section>
