<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:48
         compiled from "/var/www/profimaster/application/frontend/components/auth/auth.reset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5619675025a4e3de0185c25-26299500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6b9f6579b37279693d1e843c53fcfb2c450923d' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/auth/auth.reset.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5619675025a4e3de0185c25-26299500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3de018bf01_54028578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3de018bf01_54028578')) {function content_5a4e3de018bf01_54028578($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<form action="<?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
password-reset/" method="post" class="js-form-validate js-auth-reset-form">
    
    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'email','label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['reset']['form']['fields']['mail']['label']),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'button','name'=>'submit_reset','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['reset']['form']['fields']['submit']['text']),$_smarty_tpl);?>

</form><?php }} ?>