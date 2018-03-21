<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:25
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16923226055ab207414ba965-85138403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9127365cbd8c114760419eb17b0f1568197397' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.registration.tpl',
      1 => 1521033977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16923226055ab207414ba965-85138403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sRole' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab207414bd423_42424406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab207414bd423_42424406')) {function content_5ab207414bd423_42424406($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('redirectUrl')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'freelancer:register.role','role'=>$_smarty_tpl->tpl_vars['sRole']->value),$_smarty_tpl);?>



<?php }} ?>