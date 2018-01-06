<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/role-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4467695135a4e3de0082313-52254449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98bdddbf3dd24b9f6a64373f7c3c178688a23e43' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/role-buttons.tpl',
      1 => 1506506848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4467695135a4e3de0082313-52254449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3de008db95_99430748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3de008db95_99430748')) {function content_5a4e3de008db95_99430748($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-role', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('role')),$_smarty_tpl);?>


<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['role']->value=='master'){?><?php echo "primary";?><?php }?><?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['role']->value=='employer'){?><?php echo "primary";?><?php }?><?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','label'=>"Выберете вашу роль",'buttons'=>array(array('text'=>'Мастер','mods'=>$_tmp1." large",'classes'=>'master-but','type'=>'button','value'=>'master'),array('text'=>'Заказчик','mods'=>$_tmp2." large",'classes'=>'employer-but','type'=>'button','value'=>'employer'))),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'title'=>"Выберете вашу роль",'content'=>$_tmp3),$_smarty_tpl);?>

<?php }} ?>