<?php
/* Smarty version 5.4.3, created on 2024-12-29 17:40:42
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6771191a582105_38182607',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '28038e6c683d2301d0bf2fd5efb13bea16aba0d0' => 
    array (
      0 => 'index.tpl',
      1 => 1734914324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_6771191a582105_38182607 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CS/Smarty/1_Start/vendor/smarty/smarty/demo/templates';
$_smarty_tpl->getCompiled()->nocache_hash = '789082796771191a4f2313_68787037';
$_smarty_tpl->configLoad("test.conf", "setup");
?>

<?php $_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), (int) 0, $_smarty_current_dir);
?>

<PRE>

    <?php if ($_smarty_tpl->getConfigVariable('bold')) {?><b><?php }?>
                Title: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getConfigVariable('title'));?>

        <?php if ($_smarty_tpl->getConfigVariable('bold')) {?></b><?php }?>

    The current date and time is <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"%Y-%m-%d %H:%M:%S");?>


    Example of accessing server environment variable SERVER_NAME: <?php echo $_SERVER['SERVER_NAME'];?>


    The value of {$Name} is <b><?php echo '/*%%SmartyNocache:789082796771191a4f2313_68787037%%*/<?php echo $_smarty_tpl->getValue(\'Name\');?>
/*/%%SmartyNocache:789082796771191a4f2313_68787037%%*/';?>
</b>

variable modifier example of {$Name|upper}

<b><?php echo '/*%%SmartyNocache:789082796771191a4f2313_68787037%%*/<?php echo mb_strtoupper((string) $_smarty_tpl->getValue(\'Name\') ?? \'\', \'UTF-8\');?>
/*/%%SmartyNocache:789082796771191a4f2313_68787037%%*/';?>
</b>


An example of a section loop:

    <?php
$__section_outer_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('FirstName')) ? count($_loop) : max(0, (int) $_loop));
$__section_outer_0_total = $__section_outer_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_outer'] = new \Smarty\Variable(array());
if ($__section_outer_0_total !== 0) {
for ($__section_outer_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] = 0; $__section_outer_0_iteration <= $__section_outer_0_total; $__section_outer_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum'] = $__section_outer_0_iteration;
?>
        <?php if ((1 & ($_smarty_tpl->getValue('__smarty_section_outer')['index'] ?? null) / 2)) {?>
            <?php echo ($_smarty_tpl->getValue('__smarty_section_outer')['rownum'] ?? null);?>
 . <?php echo $_smarty_tpl->getValue('FirstName')[($_smarty_tpl->getValue('__smarty_section_outer')['index'] ?? null)];?>
 <?php echo $_smarty_tpl->getValue('LastName')[($_smarty_tpl->getValue('__smarty_section_outer')['index'] ?? null)];?>

        <?php } else { ?>
            <?php echo ($_smarty_tpl->getValue('__smarty_section_outer')['rownum'] ?? null);?>
 * <?php echo $_smarty_tpl->getValue('FirstName')[($_smarty_tpl->getValue('__smarty_section_outer')['index'] ?? null)];?>
 <?php echo $_smarty_tpl->getValue('LastName')[($_smarty_tpl->getValue('__smarty_section_outer')['index'] ?? null)];?>

        <?php }?>
        <?php }} else {
 ?>
        none
    <?php
}
?>

    An example of section looped key values:

    <?php
$__section_sec1_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('contacts')) ? count($_loop) : max(0, (int) $_loop));
$__section_sec1_0_total = $__section_sec1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = new \Smarty\Variable(array());
if ($__section_sec1_0_total !== 0) {
for ($__section_sec1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] = 0; $__section_sec1_0_iteration <= $__section_sec1_0_total; $__section_sec1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']++){
?>
        phone: <?php echo $_smarty_tpl->getValue('contacts')[($_smarty_tpl->getValue('__smarty_section_sec1')['index'] ?? null)]['phone'];?>

        <br>

            fax: <?php echo $_smarty_tpl->getValue('contacts')[($_smarty_tpl->getValue('__smarty_section_sec1')['index'] ?? null)]['fax'];?>

        <br>

            cell: <?php echo $_smarty_tpl->getValue('contacts')[($_smarty_tpl->getValue('__smarty_section_sec1')['index'] ?? null)]['cell'];?>

        <br>
    <?php
}
}
?>
    <p>

        testing strip tags
        <table border=0><tr><td><A HREF="<?php echo $_smarty_tpl->getValue('SCRIPT_NAME');?>
"><font color="red">This is a test </font></A></td></tr></table>

</PRE>

This is an example of the html_select_date function:

<form>
    <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('html_select_date')->handle(array('start_year'=>1998,'end_year'=>2010), $_smarty_tpl);?>

</form>

This is an example of the html_select_time function:

<form>
    <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('html_select_time')->handle(array('use_24_hours'=>false), $_smarty_tpl);?>

</form>

This is an example of the html_options function:

<form>
    <select name=states>
        <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('html_options')->handle(array('values'=>$_smarty_tpl->getValue('option_values'),'selected'=>$_smarty_tpl->getValue('option_selected'),'output'=>$_smarty_tpl->getValue('option_output')), $_smarty_tpl);?>

    </select>
</form>

<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
