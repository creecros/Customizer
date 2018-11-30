<form name="themecreator" id="themecreator" class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'create_theme', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
<?= $this->form->csrf() ?>
  <div class="column-100" style="min-height: 600px;">
    <?= t('Theme Name: ') ?><input type="text" name="theme_name" placeholder="<?= t('Theme Name') ?>" pattern="[a-zA-Z0-9]+" title="<?= t('it should only contain alphanumeric without spaces') ?>" required>
    <br>
    <br>
    <table>
      <tr>
        <th colspan="2" class="title-creator">
          <?= t('Header') ?>
        </th>
      <tr>
        <td>
          <strong><?= t('Header Background') ?></strong>
        </td>
        <td>
          <input class="color" name="header_background" value="">
        </td>
        <td>
          <strong><?= t('Header Shade') ?></strong>
        </td>
        <td>
          <input class="color" name="header_shade" value="">
        </td>
      </tr>
      <tr>
        <td>
          <strong><?= t('Header Title') ?></strong>
        </td>
        <td>
          <input class="color" name="header_title" value="">
        </td>
      </tr>
      <tr>
        <td>
          <strong><?= t('Notification Icon') ?></strong>
        </td>
        <td>
          <input class="color" name="notification_icon" value="">
        </td>
      </tr>
      <tr>
        <th colspan="2" class="title-creator">
          <?= t('Body') ?>
        </th>
      <tr>
      <tr>
        <td>
          <strong><?= t('Background Color') ?></strong>
        </td>
        <td>
          <input class="color" name="background_color" value="">
        </td>
      </tr>
      <tr>
        <td>
          <strong><?= t('Main Font and Icons') ?></strong>
        </td>
        <td>
          <input class="color" name="font_main" value="">
        </td>
        <td>
          <strong><?= t('Secondary Fonts and Icons') ?></strong>
        </td>
        <td>
          <input class="color" name="font_secondary" value="">
        </td>
      </tr>
      <tr>
        <td>
          <strong><?= t('Links') ?></strong>
        </td>
        <td>
          <input class="color" name="font_link" value="">
        </td>
        <td>
          <strong><?= t('Link Hover & Focus') ?></strong>
        </td>
        <td>
          <input class="color" name="font_link_focus" value="">
        </td>
      </tr>
      <tr>
        <td>
          <strong><?= t('Over due') ?></strong>
        </td>
        <td>
          <input class="color" name="font_overdue" value="">
        </td>
      </tr>
    </table>    
  </div>
  <div class="form-actions" style="margin-bottom: 50px">
    <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
  </div>
</form>
