<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/response/response-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14269345965a4a11c6d53db3-69081983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd44b52870887f9372f353dd9b1ea1f702e880da' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/response/response-list.tpl',
      1 => 1502850104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14269345965a4a11c6d53db3-69081983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'aResponses' => 0,
    'oResponse' => 0,
    'itemMods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11c6d68928_67773748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11c6d68928_67773748')) {function content_5a4a11c6d68928_67773748($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-response-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aResponses','mods','itemMods','classes','back')),$_smarty_tpl);?>

<div class="<?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
">
<?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aResponses']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
    <?php echo smarty_function_component(array('_default_short'=>'blankslate','title'=>'Отзывов пока нет'),$_smarty_tpl);?>

<?php }?>
<?php  $_smarty_tpl->tpl_vars['oResponse'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oResponse']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aResponses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oResponse']->key => $_smarty_tpl->tpl_vars['oResponse']->value){
$_smarty_tpl->tpl_vars['oResponse']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:response.item','classes'=>$_smarty_tpl->tpl_vars['classes']->value,'oResponse'=>$_smarty_tpl->tpl_vars['oResponse']->value,'mods'=>$_smarty_tpl->tpl_vars['itemMods']->value),$_smarty_tpl);?>

<?php } ?>
</div>
<?php }} ?>