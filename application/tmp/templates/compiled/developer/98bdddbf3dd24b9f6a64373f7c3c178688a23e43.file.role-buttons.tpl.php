<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:25
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/role-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10007078205ab207414bf881-12617239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98bdddbf3dd24b9f6a64373f7c3c178688a23e43' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/role-buttons.tpl',
      1 => 1521033701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10007078205ab207414bf881-12617239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab207414caf46_53051730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab207414caf46_53051730')) {function content_5ab207414caf46_53051730($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-role', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('role')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('_default_short'=>'fauth/register_master/step1'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('_default_short'=>'fauth/register_employer/step1'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'actionbar','items'=>array(array('buttons'=>array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['register']['form']['im_master'],'url'=>$_tmp1,'mods'=>'large success'))),array('buttons'=>array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['register']['form']['im_employer'],'url'=>$_tmp2,'mods'=>'large warning'))))),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'title'=>"Выберете вашу роль",'content'=>$_tmp3),$_smarty_tpl);?>

    
<?php }} ?>