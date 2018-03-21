<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:36
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/blocks/block.orders.news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10014498965ab2074c320086-87671135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '869db795355631c71844e6c58fac355fd9d312b5' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/blocks/block.orders.news.tpl',
      1 => 1509094797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10014498965ab2074c320086-87671135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aOrders' => 0,
    'oOrder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2074c327dc4_16751541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2074c327dc4_16751541')) {function content_5ab2074c327dc4_16751541($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php if (sizeof($_smarty_tpl->tpl_vars['aOrders']->value)){?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
        <?php  $_smarty_tpl->tpl_vars['oOrder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oOrder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oOrder']->key => $_smarty_tpl->tpl_vars['oOrder']->value){
$_smarty_tpl->tpl_vars['oOrder']->_loop = true;
?>
            <?php echo smarty_function_component(array('_default_short'=>"freelancer:order.block.news.item",'oOrder'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>

        <?php } ?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php echo smarty_function_component(array('_default_short'=>'block','title'=>"Новые заказы",'content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>

<?php }?><?php }} ?>