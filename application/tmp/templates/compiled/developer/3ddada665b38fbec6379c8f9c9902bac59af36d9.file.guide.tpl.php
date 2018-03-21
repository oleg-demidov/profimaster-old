<?php /* Smarty version Smarty-3.1.13, created on 2018-03-18 15:40:33
         compiled from "/var/www/profimaster/framework/frontend/components/actionbar/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13175914245aae34115e5657-75008314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ddada665b38fbec6379c8f9c9902bac59af36d9' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/actionbar/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13175914245aae34115e5657-75008314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aae3411601ea6_51721540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aae3411601ea6_51721540')) {function content_5aae3411601ea6_51721540($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><p>Список действий.</p>

<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<p>У компонента необходимо указать массив с группами кнопок <code>items</code>.</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'actionbar','items'=>array(array('buttons'=>array(array('icon'=>'cog'))),array('buttons'=>array(array('icon'=>'edit'),array('icon'=>'trash'),array('icon'=>'exclamation-sign','text'=>'Mark as spam'),array('text'=>'Report'))))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'actionbar' items=[
    [
        'buttons' => [
            [ 'icon' => 'cog' ]
        ]
    ],
    [
        'buttons' => [
            [ 'icon' => 'edit' ],
            [ 'icon' => 'trash' ],
            [ 'icon' => 'exclamation-sign', 'text' => 'Mark as spam' ],
            [ 'text' => 'Report' ]
        ]
    ]
]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>