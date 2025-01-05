<?php
/* Smarty version 5.4.3, created on 2025-01-03 21:13:06
  from 'file:edit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6777e262a7ca64_87673172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e64f226567dc8575f42cf5b69764265393172e97' => 
    array (
      0 => 'edit.tpl',
      1 => 1735909980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6777e262a7ca64_87673172 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start';
?><form method="post" action="">
<?php
$__section_series_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('series')) ? count($_loop) : max(0, (int) $_loop));
$__section_series_0_total = $__section_series_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_series'] = new \Smarty\Variable(array());
if ($__section_series_0_total !== 0) {
for ($__section_series_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index'] = 0; $__section_series_0_iteration <= $__section_series_0_total; $__section_series_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index']++){
?>
  <table>
    <tr>
      <td>series_id</td>
      <td>:</td>
      <td><?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id'];?>
</td>
      <input name="id" type="number" value="<?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id'];?>
" hidden>
    </tr>
    <tr>
      <td>name</td>
      <td>:</td>
      <td><?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['name'];?>
</td>
      <input name="name" type="text" value="<?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['name'];?>
" hidden>
    </tr>
    <tr>
      <td>stock</td>
      <td>:</td>
      <td><input name="stock" type="number" value="<?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['stock'];?>
"></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="submit" value="save">
      </td>

    </tr>
  </table>
<?php
}
}
?>
</form><?php }
}
