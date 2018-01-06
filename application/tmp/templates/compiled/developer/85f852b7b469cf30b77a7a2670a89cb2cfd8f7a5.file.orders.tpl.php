<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16864789405a4a11d420d4b1-55326410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85f852b7b469cf30b77a7a2670a89cb2cfd8f7a5' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/orders.tpl',
      1 => 1509124013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16864789405a4a11d420d4b1-55326410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'aOrders' => 0,
    'classes' => 0,
    'oOrder' => 0,
    'mods' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11d4217636_93222610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11d4217636_93222610')) {function content_5a4a11d4217636_93222610($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-order-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aOrders','mods','classes','back')),$_smarty_tpl);?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 js-order-items">
<?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aOrders']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
    <?php echo smarty_function_component(array('_default_short'=>'blankslate','title'=>'Заказов пока нет'),$_smarty_tpl);?>

<?php }?>
<?php  $_smarty_tpl->tpl_vars['oOrder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oOrder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oOrder']->key => $_smarty_tpl->tpl_vars['oOrder']->value){
$_smarty_tpl->tpl_vars['oOrder']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:order.order-list-item','classes'=>$_smarty_tpl->tpl_vars['classes']->value,'oOrder'=>$_smarty_tpl->tpl_vars['oOrder']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value,'back'=>$_smarty_tpl->tpl_vars['back']->value),$_smarty_tpl);?>

<?php } ?>
</div>
<?php }} ?>