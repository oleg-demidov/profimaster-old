<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 17:20:22
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/wall-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7233101525a4cbc769f7bd1-01762660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3727f0c9149982bf91e790a17ac6748149f84ce9' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/wall-buttons.tpl',
      1 => 1513149706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7233101525a4cbc769f7bd1-01762660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'oUserProfile' => 0,
    'oUser' => 0,
    'iCountInvites' => 0,
    'iPaymentsCount' => 0,
    'sCurrentPage' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4cbc76a0cbd9_63530612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4cbc76a0cbd9_63530612')) {function content_5a4cbc76a0cbd9_63530612($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-wall-buttons', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','sCurrentPage')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&($_smarty_tpl->tpl_vars['oUserProfile']->value->getId()==$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()||$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator())){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"manager/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/invites"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('name'=>'invites','url'=>$_tmp1,'text'=>'Приглашения','count'=>$_smarty_tpl->tpl_vars['iCountInvites']->value);?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"manager/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/payments"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('name'=>'payments','url'=>$_tmp2,'text'=>'Оплаты','count'=>$_smarty_tpl->tpl_vars['iPaymentsCount']->value);?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"manager/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/transactions"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('name'=>'transactions','url'=>$_tmp3,'text'=>'Баланс');?>
<?php }?>

<?php echo smarty_function_component(array('_default_short'=>'nav','activeItem'=>$_smarty_tpl->tpl_vars['sCurrentPage']->value,'mods'=>'pills wall-buttons large','items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>
<?php }} ?>