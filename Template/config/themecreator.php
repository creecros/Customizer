<form name="themecreator" id="themecreator" class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'create_theme', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
<?= $this->form->csrf() ?>
  <div class="column-100" style="min-height: 900px;">
    <?= t('Theme Name: ') ?><input type="text" name="theme_name" placeholder="<?= t('Theme Name') ?>" pattern="[a-zA-Z0-9]+" title="<?= t('it should only contain alphanumeric without spaces') ?>" required>
    <br>
    <br>
    <table>
      <tr>
        <th colspan="2" class="title-creator">
          <?= t('Header') ?>
        </th>
      <tr>
        <th>
          <strong><?= t('Header Background') ?></strong>
        </th>
        <th>
          <input class="color" name="header_background" value="">
        </th>
        <th>
          <strong><?= t('Header Shade') ?></strong>
        </th>
        <th>
          <input class="color" name="header_shade" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Header Title') ?></strong>
        </th>
        <th>
          <input class="color" name="header_title" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Notification Icon') ?></strong>
        </th>
        <th>
          <input class="color" name="notification_icon" value="">
        </th>
      </tr>
      <tr>
        <th colspan="2" class="title-creator">
          <?= t('Body') ?>
        </th>
      <tr>
      <tr>
        <th>
          <strong><?= t('Background Color') ?></strong>
        </th>
        <th>
          <input class="color" name="background_color" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Main Font and Icons') ?></strong>
        </th>
        <th>
          <input class="color" name="font_main" value="">
        </th>
        <th>
          <strong><?= t('Secondary Fonts and Icons') ?></strong>
        </th>
        <th>
          <input class="color" name="font_secondary" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Links') ?></strong>
        </th>
        <th>
          <input class="color" name="font_link" value="">
        </th>
        <th>
          <strong><?= t('Link Hover & Focus') ?></strong>
        </th>
        <th>
          <input class="color" name="font_link_focus" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Over due') ?></strong>
        </th>
        <th>
          <input class="color" name="font_overdue" value="">
        </th>
      </tr>
    </table>    
  </div>
  <div class="form-actions" style="margin-bottom: 50px">
    <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
  </div>
</form>
