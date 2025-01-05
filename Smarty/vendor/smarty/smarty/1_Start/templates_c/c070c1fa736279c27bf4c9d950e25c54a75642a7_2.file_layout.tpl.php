<?php
/* Smarty version 5.4.3, created on 2025-01-04 11:23:13
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6778a9a1798507_78033479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c070c1fa736279c27bf4c9d950e25c54a75642a7' => 
    array (
      0 => 'layout.tpl',
      1 => 1735960975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6778a9a1798507_78033479 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/templates';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('title')), ENT_QUOTES, 'UTF-8');?>
</title>

    <link rel="stylesheet" href="css/index.css">

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js"><?php echo '</script'; ?>
>
</head>
<body>

<?php
$__section_series_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('data')) ? count($_loop) : max(0, (int) $_loop));
$__section_series_0_total = $__section_series_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_series'] = new \Smarty\Variable(array());
if ($__section_series_0_total !== 0) {
for ($__section_series_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index'] = 0; $__section_series_0_iteration <= $__section_series_0_total; $__section_series_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_series']->value['index']++){
?>
  <?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['series']), ENT_QUOTES, 'UTF-8');?>
 <br>

  <?php
$__section_img_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['img']) ? count($_loop) : max(0, (int) $_loop));
$__section_img_0_total = $__section_img_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_img'] = new \Smarty\Variable(array());
if ($__section_img_0_total !== 0) {
for ($__section_img_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_img']->value['index'] = 0; $__section_img_0_iteration <= $__section_img_0_total; $__section_img_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_img']->value['index']++){
?>
    <?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('data')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['img'][($_smarty_tpl->getValue('__smarty_section_img')['index'] ?? null)]['img']), ENT_QUOTES, 'UTF-8');?>
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
  id : <?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('result')[($_smarty_tpl->getValue('__smarty_section_query1')['index'] ?? null)]['id']), ENT_QUOTES, 'UTF-8');?>
, 
  rownum : <?php echo htmlspecialchars((string) (($_smarty_tpl->getValue('__smarty_section_query1')['rownum'] ?? null)), ENT_QUOTES, 'UTF-8');?>
,
  iteration : <?php echo htmlspecialchars((string) (($_smarty_tpl->getValue('__smarty_section_query1')['iteration'] ?? null)), ENT_QUOTES, 'UTF-8');?>
,
  index : <?php echo htmlspecialchars((string) (($_smarty_tpl->getValue('__smarty_section_query1')['index'] ?? null)), ENT_QUOTES, 'UTF-8');?>

  of <?php echo htmlspecialchars((string) (($_smarty_tpl->getValue('__smarty_section_query1')['total'] ?? null)), ENT_QUOTES, 'UTF-8');?>

  <?php if (!($_smarty_tpl->getValue('__smarty_section_query1')['last'] ?? null)) {?>,<?php }?><br>
<?php
}
}
?>

<?php if ($_smarty_tpl->getValue('state') == '註冊成功') {?>
  <?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('state')), ENT_QUOTES, 'UTF-8');?>
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
          <option value="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('county')[($_smarty_tpl->getValue('__smarty_section_county')['index'] ?? null)]['id']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('county')[($_smarty_tpl->getValue('__smarty_section_county')['index'] ?? null)]['county']), ENT_QUOTES, 'UTF-8');?>
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
        <td><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('state')), ENT_QUOTES, 'UTF-8');?>
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
    <td><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id']), ENT_QUOTES, 'UTF-8');?>
</td>
    <td><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['name']), ENT_QUOTES, 'UTF-8');?>
</td>
    <td><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['stock']), ENT_QUOTES, 'UTF-8');?>
</td>
    <td><a href=edit.php?series_id=<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('series')[($_smarty_tpl->getValue('__smarty_section_series')['index'] ?? null)]['id']), ENT_QUOTES, 'UTF-8');?>
>edit</a></td>
  </tr>
  <?php
}
}
?>
</table>
</form>

<?php echo '<script'; ?>
 src="js/index.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
