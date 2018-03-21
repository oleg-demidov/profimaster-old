<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:36
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/wall-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17042998255ab2074c4fdf93-53281162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13a562b5ba5ca837cf825c1abce85ef87ad790fc' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/wall-buttons.tpl',
      1 => 1508922353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17042998255ab2074c4fdf93-53281162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUser' => 0,
    'sCurrentPage' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2074c5141b7_35839423',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2074c5141b7_35839423')) {function content_5ab2074c5141b7_35839423($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-wall-buttons', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','sCurrentPage')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/about"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/responses"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(array('name'=>'about','url'=>$_tmp1,'text'=>'Описание'),array('name'=>'responses','url'=>$_tmp2,'text'=>'Отзывы','count'=>$_smarty_tpl->tpl_vars['oUser']->value->getCountResponsed())), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['oUser']->value->isMaster()){?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/portfolio"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('name'=>'portfolio','url'=>$_tmp3,'text'=>'Портфолио','count'=>$_smarty_tpl->tpl_vars['oUser']->value->getCountWorks());?>
<?php }?>
    
<?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getLogin())."/orders"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('name'=>'orders','url'=>$_tmp4,'text'=>'Заказы','count'=>$_smarty_tpl->tpl_vars['oUser']->value->getCountOrders());?>
<?php echo smarty_function_component(array('_default_short'=>'nav','activeItem'=>$_smarty_tpl->tpl_vars['sCurrentPage']->value,'mods'=>'pills wall-buttons large','items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>

<?php }} ?>