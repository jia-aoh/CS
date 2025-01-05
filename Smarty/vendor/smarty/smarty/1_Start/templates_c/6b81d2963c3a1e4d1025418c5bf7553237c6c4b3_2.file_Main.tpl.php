<?php
/* Smarty version 5.4.3, created on 2025-01-04 14:59:57
  from 'file:layout/Main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6778dc6ddae940_66070133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b81d2963c3a1e4d1025418c5bf7553237c6c4b3' => 
    array (
      0 => 'layout/Main.tpl',
      1 => 1735973654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_6778dc6ddae940_66070133 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/layout';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8539659526778dc6dda51b1_16757796', 'title');
?>
</title>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15122201006778dc6dda6ef1_78232427', 'head');
?>


</head>
<body>

<?php $_smarty_tpl->renderSubTemplate("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12211057936778dc6ddac4e4_18099766', 'body');
?>


<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    
</body>
</html><?php }
/* {block 'title'} */
class Block_8539659526778dc6dda51b1_16757796 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/layout';
?>
Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_15122201006778dc6dda6ef1_78232427 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/layout';
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_12211057936778dc6ddac4e4_18099766 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/vendor/smarty/smarty/1_Start/layout';
}
}
/* {/block 'body'} */
}
