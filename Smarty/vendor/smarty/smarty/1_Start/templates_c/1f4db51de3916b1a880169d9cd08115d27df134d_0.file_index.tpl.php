<?php
/* Smarty version 5.4.3, created on 2025-01-04 10:54:41
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6778a2f1955e37_07216804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f4db51de3916b1a880169d9cd08115d27df134d' => 
    array (
      0 => 'index.tpl',
      1 => 1735958952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head_css.tpl' => 1,
    'file:end_script.tpl' => 1,
  ),
))) {
function content_6778a2f1955e37_07216804 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/templates';
$_smarty_tpl->renderSubTemplate("file:head_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'index'), (int) 0, $_smarty_current_dir);
?>

<?php
$__section_series_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('data')) ? count($_loop) : max(0, (int) $_loop));
$__section_series_0_total = $__section_series_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_series'] = new \Smarty\Variable(array());
if ($__section_series_0_total !== 0) {
for ($__section_series_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index'] = 0; $__section_series_0_iteration <= $__section_series_0_total; $__section_series_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index']++){
?>
  <?php echo $_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['series'];?>
 <br>

  <?php
$__section_img_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['img']) ? count($_loop) : max(0, (int) $_loop));
$__section_img_0_total = $__section_img_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_img'] = new \Smarty\Variable(array());
if ($__section_img_0_total !== 0) {
for ($__section_img_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_img']->value['index'] = 0; $__section_img_0_iteration <= $__section_img_0_total; $__section_img_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_img']->value['index']++){
?>
    <?php echo $_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['img'][($_smarty_tpl->getValue('__smarty_section_img')['index'] ?? null)]['img'];?>
 <br>
  <?php
}
}
?>

<?php
}
}
?>

<?php
$__section_query1_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('result')) ? count($_loop) : max(0, (int) $_loop));
$_smarty_tpl->tpl_vars['__smarty_section_query1'] = new \Smarty\Variable(array('total' => min(($__section_query1_0_loop - 0), $__section_query1_0_loop)));
if ($_smarty_tpl->tpl_vars['__smarty_section_query1']->value['total'] !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_query1']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['iteration'] <= $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['total']; $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_query1']->value['rownum'] = $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['iteration'];
$_smarty_tpl->tpl_vars['__smarty_section_query1']->value['last'] = ($_smarty_tpl->tpl_vars['__smarty_section_query1']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_section_query1']->value['total']);
?>
  id : <?php echo $_smarty_tpl->getValue('result')[($_smarty_tpl->getValue('__smarty_section_query1')['index'] ?? null)]['id'];?>
, 
  rownum : <?php echo ($_smarty_tpl->getValue('__smarty_section_query1')['rownum'] ?? null);?>
,
  iteration : <?php echo ($_smarty_tpl->getValue('__smarty_section_query1')['iteration'] ?? null);?>
,
  index : <?php echo ($_smarty_tpl->getValue('__smarty_section_query1')['index'] ?? null);?>

  of <?php echo ($_smarty_tpl->getValue('__smarty_section_query1')['total'] ?? null);?>

  <?php if (!($_smarty_tpl->getValue('__smarty_section_query1')['last'] ?? null)) {?>,<?php }?><br>
<?php
}
}
?>

<?php if ($_smarty_tpl->getValue('state') == '註冊成功') {?>
  <?php echo $_smarty_tpl->getValue('state');?>
 <br>
  <meta http-equiv="refresh" content="3">
<?php } else { ?>
  <form method="POST" action="">
  <table>
    <tr>
      <td>name</td>
      <td>:</td>
      <td><input type="text" name="name"></td>
    </tr>
    <tr>
      <td>email</td>
      <td>:</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>password</td>
      <td>:</td>
      <td><input type="text" name="password"></td>
    </tr>
    <tr>
      <td>birth</td>
      <td>:</td>
      <td><input type="date" name="birth"></td>
    </tr>
    <tr>
      <td>county</td>
      <td>:</td>
      <td>
      <select name="county_id">
        <?php
$__section_county_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('county')) ? count($_loop) : max(0, (int) $_loop));
$__section_county_0_total = $__section_county_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_county'] = new \Smarty\Variable(array());
if ($__section_county_0_total !== 0) {
for ($__section_county_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_county']->value['index'] = 0; $__section_county_0_iteration <= $__section_county_0_total; $__section_county_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_county']->value['index']++){
?>
          <option value="<?php echo $_smarty_tpl->getValue('county')[($_smarty_tpl->getValue('__smarty_section_county')['index'] ?? null)]['id'];?>
"><?php echo $_smarty_tpl->getValue('county')[($_smarty_tpl->getValue('__smarty_section_county')['index'] ?? null)]['county'];?>
</option>
        <?php
}
}
?>
      </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="state" value="save"></td>
      <?php if ($_smarty_tpl->getValue('state')) {?>
        <td>!!!</td>
        <td><?php echo $_smarty_tpl->getValue('state');?>
</td>
      <?php }?>
    </tr>
  </table>
  </form>
<?php }?>
  
<hr>

<form action="">
<table border=1>
  <tr>
    <td>series_id</td>
    <td>name</td>
    <td>stock</td>
    <td>edit</td>
  </tr>
  <?php
$__section_series_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('series')) ? count($_loop) : max(0, (int) $_loop));
$__section_series_0_total = $__section_series_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_series'] = new \Smarty\Variable(array());
if ($__section_series_0_total !== 0) {
for ($__section_series_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index'] = 0; $__section_series_0_iteration <= $__section_series_0_total; $__section_series_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index']++){
?>
  <tr>
    <td><?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id'];?>
</td>
    <td><?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['name'];?>
</td>
    <td><?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['stock'];?>
</td>
    <td><a href=edit.php?series_id=<?php echo $_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id'];?>
>edit</a></td>
  </tr>
  <?php
}
}
?>
</table>
</form>

<?php $_smarty_tpl->renderSubTemplate("file:end_script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
