<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:47
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7285036745ab1050fade1c4-74199012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da848bb54a2fabba8b164eb6a54888ad819e9837' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step4.tpl',
      1 => 1506131162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7285036745ab1050fade1c4-74199012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sEmail' => 0,
    'sNumber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1050fae4420_60013819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1050fae4420_60013819')) {function content_5ab1050fae4420_60013819($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['sEmail']->value){?>
    <?php echo smarty_function_component(array('_default_short'=>"freelancer:register.activation"),$_smarty_tpl);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['sNumber']->value){?>
    <?php echo smarty_function_component(array('_default_short'=>"freelancer:register.sms"),$_smarty_tpl);?>

<?php }?>
<?php }} ?>