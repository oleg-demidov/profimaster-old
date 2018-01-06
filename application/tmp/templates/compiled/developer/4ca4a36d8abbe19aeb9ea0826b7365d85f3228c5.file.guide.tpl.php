<?php /* Smarty version Smarty-3.1.13, created on 2017-12-26 13:28:54
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/dropdown/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16791764415a41fa36da02c9-07387453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ca4a36d8abbe19aeb9ea0826b7365d85f3228c5' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/dropdown/docs/guide.tpl',
      1 => 1509206601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16791764415a41fa36da02c9-07387453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a41fa36df0e95_49872469',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a41fa36df0e95_49872469')) {function content_5a41fa36df0e95_49872469($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['menu'] = new Smarty_variable(array(array('text'=>'Edit'),array('text'=>'Delete'),array('text'=>'Send')), null, 0);?>

<script>
    domReady(function() {
        $('.js-mydropdown').lsDropdown();
    });
</script>



<p>В параметре <code>menu</code> прописываем массив с пунктами меню, в параметре <code>classes</code> указываем класс к которому будем привязывать jquery-виджет <code>lsDropdown</code>.</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Dropdown','classes'=>'js-mydropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
<script>
    jQuery(function ($) {
        $('.js-mydropdown').lsDropdown();
    });
</script>

{component 'dropdown' text='Dropdown' classes='js-mydropdown' menu=[
    [ 'text' => 'Edit' ],
    [ 'text' => 'Delete' ],
    [ 'text' => 'Send' ]
]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>





<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Цвета'));?>


<p>В параметре <code>mods</code> можно указывать цвет кнопки.</p>
<p>Модификаторы <code>primary</code> <code>success</code> <code>info</code> <code>warning</code> <code>danger</code>.</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Default','classes'=>'js-mydropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Primary','classes'=>'js-mydropdown','mods'=>'primary','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Success','classes'=>'js-mydropdown','mods'=>'success','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Info','classes'=>'js-mydropdown','mods'=>'info','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Warning','classes'=>'js-mydropdown','mods'=>'warning','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','text'=>'Danger','classes'=>'js-mydropdown','mods'=>'danger','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'dropdown' text='Default' classes='js-mydropdown' menu=...}
{component 'dropdown' text='Primary' classes='js-mydropdown' mods='primary' menu=...}
{component 'dropdown' text='Success' classes='js-mydropdown' mods='success' menu=...}
{component 'dropdown' text='Info'    classes='js-mydropdown' mods='info' menu=...}
{component 'dropdown' text='Warning' classes='js-mydropdown' mods='warning' menu=...}
{component 'dropdown' text='Danger'  classes='js-mydropdown' mods='danger' menu=...}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>





<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Размеры'));?>


<p>Модификаторы <code>large</code> <code>small</code></p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Large dropdown','mods'=>'large','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <br>
    <br>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Default dropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <br>
    <br>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Small dropdown','mods'=>'small','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'dropdown' text='Large dropdown' classes='js-mydropdown' mods='large' menu=...}
{component 'dropdown' text='Default dropdown' classes='js-mydropdown' menu=...}
{component 'dropdown' text='Small dropdown' classes='js-mydropdown' mods='small' menu=...}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>





<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Раздельный переключатель'));?>


<p>Для того чтобы кнопка показывающая меню была отделена от текста, необходимо в параметре <code>isSplit</code> прописать <code>true</code>.</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','isSplit'=>true,'text'=>'Actions','classes'=>'js-mydropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','isSplit'=>true,'text'=>'Actions','classes'=>'js-mydropdown','mods'=>'success','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'dropdown' text='Actions' classes='js-mydropdown' isSplit=true menu=...}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>




<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Группировка'));?>


<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','mods'=>'info','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Dropdown','icon'=>'star','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>

    <br>
    <br>
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Dropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Dropdown','icon'=>'ok','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','icon'=>'ok','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','buttons'=>array(array('text'=>'Hello'),$_tmp1,$_tmp2,$_tmp3,$_tmp4,array('text'=>'Hello'),array('text'=>'Hello'))),$_smarty_tpl);?>

    <br>
    <br>
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'dropdown','classes'=>'js-mydropdown','text'=>'Dropdown','menu'=>$_smarty_tpl->tpl_vars['menu']->value),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','buttons'=>array($_tmp5)),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
TODO
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>