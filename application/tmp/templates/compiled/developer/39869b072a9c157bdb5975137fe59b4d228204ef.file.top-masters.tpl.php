<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/top-masters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8736770355aaf4e501e4fb4-23454021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39869b072a9c157bdb5975137fe59b4d228204ef' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/top-masters.tpl',
      1 => 1511178321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8736770355aaf4e501e4fb4-23454021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aMasters' => 0,
    'oMaster' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e501eee81_16483044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e501eee81_16483044')) {function content_5aaf4e501eee81_16483044($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-top-masters', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aMasters')),$_smarty_tpl);?>



<?php $_smarty_tpl->_capture_stack[0][] = array('title', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'user'),$_smarty_tpl);?>
 Лучшие мастера
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php  $_smarty_tpl->tpl_vars['oMaster'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMaster']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMasters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMaster']->key => $_smarty_tpl->tpl_vars['oMaster']->value){
$_smarty_tpl->tpl_vars['oMaster']->_loop = true;
?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.block.top-master-item','oMaster'=>$_smarty_tpl->tpl_vars['oMaster']->value),$_smarty_tpl);?>

    <?php } ?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo smarty_function_component(array('_default_short'=>'block','title'=>Smarty::$_smarty_vars['capture']['title'],'mods'=>'success','content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>
<?php }} ?>