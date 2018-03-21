<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:57:30
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.reactivation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6280895785ab1053a0efad5-13499828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c5096b93f4957948522e2923f5e6f711964df41' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.reactivation.tpl',
      1 => 1505902432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6280895785ab1053a0efad5-13499828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sEmail' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1053a0f6be8_30574533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1053a0f6be8_30574533')) {function content_5ab1053a0f6be8_30574533($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<form action="<?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
reactivation/" method="post" class="js-form-reactivation">
    
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sEmail']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'email','value'=>$_tmp1,'label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['reactivation']['form']['fields']['mail']['label']),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'button','name'=>'submit_reactivation','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['reactivation']['form']['fields']['submit']['text']),$_smarty_tpl);?>

</form><?php }} ?>