<?php /* Smarty version Smarty-3.1.13, created on 2018-03-18 15:57:58
         compiled from "/var/www/profimaster/framework/frontend/components/info-list/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8493852625aae3826b2e906-55522223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '060a37e730cba02e5a142f2489b605c1f33bda5a' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/info-list/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8493852625aae3826b2e906-55522223',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aae3826b38986_87819062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aae3826b38986_87819062')) {function content_5aae3826b38986_87819062($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<p>Список свойств объекта.</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'info-list','list'=>array(array('label'=>'Вес:','content'=>'0.1кг'),array('label'=>'Размеры:','content'=>'100х100мм'),array('label'=>'Цвет:','content'=>'Белый'))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'info-list' list=[
    [ 'label' => 'Вес:', 'content' => '0.1кг' ],
    [ 'label' => 'Размеры:', 'content' => '100х100мм' ],
    [ 'label' => 'Цвет:', 'content' => 'Белый' ]
]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>