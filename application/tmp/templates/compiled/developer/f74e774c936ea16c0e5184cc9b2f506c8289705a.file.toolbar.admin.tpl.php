<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:12
         compiled from "/var/www/profimaster/application/frontend/components/admin/toolbar.admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8049515785a4e49ec06a504-13795121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f74e774c936ea16c0e5184cc9b2f506c8289705a' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/admin/toolbar.admin.tpl',
      1 => 1514540674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8049515785a4e49ec06a504-13795121',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ec06fa00_11954470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ec06fa00_11954470')) {function content_5a4e49ec06fa00_11954470($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'admin.title'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'toolbar.item','icon'=>'cog','url'=>$_tmp1,'attributes'=>array('title'=>$_tmp2),'mods'=>'admin'),$_smarty_tpl);?>

<?php }?><?php }} ?>