<?php /* Smarty version Smarty-3.1.13, created on 2017-12-30 14:57:15
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8959130225a4754ebeb41f7-17915879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f38910c93a8238887a7e1b7b569564085afac136' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/actions.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8959130225a4754ebeb41f7-17915879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'user' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
    'text' => 0,
    'classes' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4754ebee6984_11257024',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4754ebee6984_11257024')) {function content_5a4754ebee6984_11257024($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php echo smarty_function_component_define_params(array('params'=>array('user','text','classes')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('page'=>'talk/add'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable(array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['msg'],'url'=>$_tmp1."?talk_recepient_id=".((string)$_smarty_tpl->tpl_vars['user']->value->getId()))), null, 0);?>


<?php if (!in_array($_smarty_tpl->tpl_vars['user']->value->getId(),Config::Get('plugin.admin.users.block_managing_admin_rights_user_ids'))){?>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->isAdministrator()){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"admin/users/manageadmins/delete/".((string)$_smarty_tpl->tpl_vars['user']->value->getId())),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['admin_delete'],'url'=>$_tmp2."?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),'classes'=>'js-question');?>
    <?php }else{ ?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"admin/users/manageadmins/add/".((string)$_smarty_tpl->tpl_vars['user']->value->getId())),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['admin_add'],'url'=>$_tmp3."?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),'classes'=>'js-question');?>
    <?php }?>
<?php }?>


<?php if (!in_array($_smarty_tpl->tpl_vars['user']->value->getId(),Config::Get('plugin.admin.users.block_deleting_user_ids'))){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/deleteuser'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['user_delete'],'url'=>$_tmp4."?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value->getId()));?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/bans/add'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['ban'],'url'=>$_tmp5."?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value->getId()));?>
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['user']->value->getActivate()){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/activate'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['top_bar']['activate'],'url'=>$_tmp6."?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value->getId())."&security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value));?>
<?php }?>

<?php echo smarty_function_component(array('_default_short'=>'admin:dropdown','text'=>$_smarty_tpl->tpl_vars['text']->value,'classes'=>((string)$_smarty_tpl->tpl_vars['classes']->value)." js-dropdown",'menu'=>$_smarty_tpl->tpl_vars['items']->value),$_smarty_tpl);?>
<?php }} ?>