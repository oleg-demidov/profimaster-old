<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:14
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13898692405a4e49ee0d2cc4-07758844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22c06fdb3ae521ea4a129bad8141c0618c6ad5f4' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-list.tpl',
      1 => 1507896663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13898692405a4e49ee0d2cc4-07758844',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aNotify' => 0,
    'oNotify' => 0,
    'classesItem' => 0,
    'mods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ee0e0e79_29680442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ee0e0e79_29680442')) {function content_5a4e49ee0e0e79_29680442($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-notify-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aNotify','mods','classes','back','classesItem')),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['oNotify'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oNotify']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aNotify']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oNotify']->key => $_smarty_tpl->tpl_vars['oNotify']->value){
$_smarty_tpl->tpl_vars['oNotify']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:notify.item','attributes'=>array('id'=>"notify".((string)$_smarty_tpl->tpl_vars['oNotify']->value->getId())),'classes'=>$_smarty_tpl->tpl_vars['classesItem']->value,'oNotify'=>$_smarty_tpl->tpl_vars['oNotify']->value,'mods'=>((string)$_smarty_tpl->tpl_vars['mods']->value)." ".((string)$_smarty_tpl->tpl_vars['oNotify']->value->getType())),$_smarty_tpl);?>

<?php } ?>
<?php if (!sizeof($_smarty_tpl->tpl_vars['aNotify']->value)){?>
    <?php echo smarty_function_component(array('_default_short'=>'blankslate','title'=>"Пусто"),$_smarty_tpl);?>

<?php }?>
<?php }} ?>