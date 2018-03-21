<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:22:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16315041205ab0fd16ab8245-92832625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5557e5c4bc03fe0fb53703017457a109cbbdcf09' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/delete.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16315041205ab0fd16ab8245-92832625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0fd16acac66_06408057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0fd16acac66_06408057')) {function content_5ab0fd16acac66_06408057($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-user-delete', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('user')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'admin:alert','text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['deleteuser']['delete_user_info'],'mods'=>'info'),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/deleteuser'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'admin:p-form','action'=>$_tmp1,'submit'=>array('name'=>'submit_delete_user_contents','classes'=>'js-confirm-remove','text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['delete']),'form'=>array(array('field'=>'hidden','name'=>'user_id','value'=>$_smarty_tpl->tpl_vars['user']->value->getId()),array('field'=>'checkbox','name'=>'delete_user','checked'=>true,'label'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['deleteuser']['delete_user_itself']))),$_smarty_tpl);?>
<?php }} ?>