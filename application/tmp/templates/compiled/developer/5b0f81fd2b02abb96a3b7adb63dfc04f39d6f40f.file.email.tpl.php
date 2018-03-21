<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:47
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/templates/registration_activate/email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9029059345ab1050f80ae39-74497876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b0f81fd2b02abb96a3b7adb63dfc04f39d6f40f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/templates/registration_activate/email.tpl',
      1 => 1509160735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9029059345ab1050f80ae39-74497876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oTarget' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1050f81c532_06541413',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1050f81c532_06541413')) {function content_5ab1050f81c532_06541413($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php echo smarty_function_component_define_params(array('params'=>array('oTarget','oUserCurrent')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_lang(array('name'=>'emails.registration_activate.text','params'=>array('website_url'=>Router::GetPath('/'),'website_name'=>Config::Get('view.name'),'user_name'=>$_smarty_tpl->tpl_vars['oTarget']->value->getLogin(),'user_password'=>$_smarty_tpl->tpl_vars['oTarget']->value->getPassword(),'activation_url'=>$_tmp1."activate/".((string)$_smarty_tpl->tpl_vars['oTarget']->value->getActivateKey())."/")),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'freelancer:email','sTitle'=>"Активация аккаунта",'content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>

<?php }} ?>