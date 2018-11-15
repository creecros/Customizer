<form name="themecreator" id="themecreator" class="url-links" method="post" action="<?= $this->url->href('CustomizerConfigController', 'create_theme', array('plugin' => 'customizer', 'redirect' => 'application')) ?>" autocomplete="off">
<?= $this->form->csrf() ?>
  <div class="column-100">
    <?= t('Theme Name:') ?><input type="text" name="theme_name" placeholder="mytheme.css" pattern="[a-z0-9._%+-]+\.[a-z]{3}$">
    <table>
      <tr>
        <th colspan="2">
          <?= t('Header') ?>
        </th>
      <tr>
        <th>
          <strong><?= t('Header Background') ?></strong>
        </th>
        <th>
          <input class="color" name="header_background" value="#FFFFFF">
        </th>
      </tr>
    </table>  
</form>
