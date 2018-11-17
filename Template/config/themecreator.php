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
          <?= t('Submenu') ?>
        </th>
      <tr>
      <tr>
        <th>
          <strong><?= t('Submenu Color') ?></strong>
        </th>
        <th>
          <input class="color" name="dropdown_submenu_color" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Submenu Background Hover') ?></strong>
        </th>
        <th>
          <input class="color" name="dropdown_submenu_background_hover" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Submenu Color Hover') ?></strong>
        </th>
        <th>
          <input class="color" name="dropdown_submenu_color_hover" value="">
        </th>
      </tr>
      <tr>
        <th colspan="2" class="title-creator">
          <?= t('Button') ?>
        </th>
      <tr>
      <tr>
        <th>
          <strong><?= t('Button Border Color') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_border_color" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Button Background Color') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_background" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Button Text Color') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_text_color" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Button Border Color Hover') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_border_color_hover" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Button Background Color Hover') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_background_hover" value="">
        </th>
      </tr>
      <tr>
        <th>
          <strong><?= t('Button Text Color Hover') ?></strong>
        </th>
        <th>
          <input class="color" name="btn_text_color_hover" value="">
        </th>
      </tr>
    </table>    
  </div>
  <div class="form-actions" style="margin-bottom: 50px">
    <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
  </div>
</form>
