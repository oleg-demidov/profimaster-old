<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 14:29:46
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/market/button-pay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21091505565a4c947a7b3ba3-86583297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e01d282835ea002361b7e6afd777e50f8fff2d09' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/market/button-pay.tpl',
      1 => 1510730503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21091505565a4c947a7b3ba3-86583297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sTargetType' => 0,
    'iTargetId' => 0,
    'iCount' => 0,
    'component' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4c947a7be043_59646941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4c947a7be043_59646941')) {function content_5a4c947a7be043_59646941($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-button-pay', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('sTargetType','iTargetId','iCount')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('page'=>"pay/".((string)$_smarty_tpl->tpl_vars['sTargetType']->value)."/".((string)$_smarty_tpl->tpl_vars['iTargetId']->value)."/".((string)$_smarty_tpl->tpl_vars['iCount']->value)),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('params', null, 0);
$_smarty_tpl->tpl_vars['params']->value['url'] = $_tmp1;?>

<?php echo smarty_function_component(array('_default_short'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>
<?php }} ?>