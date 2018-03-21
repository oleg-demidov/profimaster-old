<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19123892845aaf4e503bfd23-89458467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd96973fb17d5ea0c7ce2a9eef67827d65cc62f6d' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-list.tpl',
      1 => 1502615274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19123892845aaf4e503bfd23-89458467',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'classes' => 0,
    'aMasters' => 0,
    'classesItem' => 0,
    'oMaster' => 0,
    'mods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e503c7c00_81775087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e503c7c00_81775087')) {function content_5aaf4e503c7c00_81775087($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-master-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aMasters','mods','classes','back','classesItem')),$_smarty_tpl);?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
">
<?php  $_smarty_tpl->tpl_vars['oMaster'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMaster']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMasters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMaster']->key => $_smarty_tpl->tpl_vars['oMaster']->value){
$_smarty_tpl->tpl_vars['oMaster']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:master.item','classes'=>$_smarty_tpl->tpl_vars['classesItem']->value,'oMaster'=>$_smarty_tpl->tpl_vars['oMaster']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>

<?php } ?>
</div>
<?php }} ?>