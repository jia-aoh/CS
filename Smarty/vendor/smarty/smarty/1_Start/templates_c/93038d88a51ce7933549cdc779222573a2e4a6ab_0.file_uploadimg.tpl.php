<?php
/* Smarty version 5.4.3, created on 2025-01-05 20:08:30
  from 'file:uploadimg.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_677a763e1e3cd9_28292651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93038d88a51ce7933549cdc779222573a2e4a6ab' => 
    array (
      0 => 'uploadimg.tpl',
      1 => 1736078906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_677a763e1e3cd9_28292651 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/templates';
?><form method="POST" enctype="multipart/form-data">
<table>
  <tr>
    <td>Upload</td>
    <td>:</td>
    <td><input type="file" name="img"></td>
  </tr>
  <tr>
    <td><input type="submit" name="upload" value="upload"></td>
  </tr>
</table>
</form>
<?php if ($_smarty_tpl->getValue('error') == "1") {?>
  <a href="download.php?id=<?php echo $_smarty_tpl->getValue('thumb_path');?>
"><b>Download Thumb</b></a>
  <img src="<?php echo $_smarty_tpl->getValue('thumb_path');?>
" alt="Thumb Image"/><br>
  <img src="<?php echo $_smarty_tpl->getValue('img_path');?>
" />
<?php }
}
}
