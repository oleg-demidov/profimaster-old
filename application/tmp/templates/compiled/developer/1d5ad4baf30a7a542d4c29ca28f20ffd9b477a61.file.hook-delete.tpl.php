<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:40:45
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-comment/hook-delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6900393335a461bad6b5743-88215409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d5ad4baf30a7a542d4c29ca28f20ffd9b477a61' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-comment/hook-delete.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6900393335a461bad6b5743-88215409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'comment' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a461bad6bdf16_67838940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a461bad6bdf16_67838940')) {function content_5a461bad6bdf16_67838940($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('comment')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/comments/delete'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'comment.actions-item','link'=>array('url'=>$_tmp1."?id=".((string)$_smarty_tpl->tpl_vars['comment']->value->getId()),'attributes'=>array('target'=>'_blank')),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['comments']['full_deleting']),$_smarty_tpl);?>

<?php }?>
<?php }} ?>