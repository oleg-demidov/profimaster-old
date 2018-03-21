<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:25
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10366837775ab104f9d67634-26641142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1c5ba254133a2a8860dcd8ba14ef44f9ae91a13' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step3.tpl',
      1 => 1505900046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10366837775ab104f9d67634-26641142',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab104f9d6a4b9_86982774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab104f9d6a4b9_86982774')) {function content_5ab104f9d6a4b9_86982774($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>



<?php echo smarty_function_component(array('_default_short'=>"freelancer:register.form"),$_smarty_tpl);?>
<?php }} ?>