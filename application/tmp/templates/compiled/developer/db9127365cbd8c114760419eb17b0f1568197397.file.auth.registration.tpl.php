<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:48
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16251886225a4e3de00767e9-23967696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9127365cbd8c114760419eb17b0f1568197397' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.registration.tpl',
      1 => 1506507179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16251886225a4e3de00767e9-23967696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'redirectUrl' => 0,
    'PATH_WEB_CURRENT' => 0,
    'sRole' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3de007df84_36390123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3de007df84_36390123')) {function content_5a4e3de007df84_36390123($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('redirectUrl')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['redirectUrl'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['redirectUrl']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['PATH_WEB_CURRENT']->value : $tmp), null, 0);?>


<form action="<?php echo smarty_function_router(array('page'=>'user/register_role'),$_smarty_tpl);?>
" method="post">

    <?php echo smarty_function_component(array('_default_short'=>'freelancer:register.role','role'=>$_smarty_tpl->tpl_vars['sRole']->value),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'button','name'=>'submit_register','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['registration']['form']['fields']['submit']['text']),$_smarty_tpl);?>

</form>

<?php }} ?>