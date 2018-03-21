<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:36
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/action-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16112326425ab2074c236c26-78215468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5e8b9d92d2aa91793ec228094db3116d4ef189b' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/action-buttons.tpl',
      1 => 1514979472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16112326425ab2074c236c26-78215468',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserProfile' => 0,
    'oUser' => 0,
    'oUserCurrent' => 0,
    'component' => 0,
    'aButtons' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2074c2513a1_67037499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2074c2513a1_67037499')) {function content_5ab2074c2513a1_67037499($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-action-buttons', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','sCurrentPage')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['oUser'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['oUserProfile']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['oUser']->value : $tmp), null, 0);?>

<?php $_smarty_tpl->_capture_stack[0][] = array('actions', null, null); ob_start(); ?>
    <?php $_smarty_tpl->tpl_vars['aButtons'] = new Smarty_variable(array(), null, 0);?>
    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isEmployer()&&$_smarty_tpl->tpl_vars['oUser']->value->isMaster()){?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>"order/add/?master_id=".((string)$_smarty_tpl->tpl_vars['oUser']->value->getId())),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aButtons', null, 0);
$_smarty_tpl->tpl_vars['aButtons']->value[] = array('text'=>'Заказ','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-but-order",'icon'=>'cart-plus','mods'=>"success large",'type'=>'button','url'=>$_tmp1);?> 
        <?php }?>
    
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"talk/add/?talk_recepient_id=".((string)$_smarty_tpl->tpl_vars['oUser']->value->getId())),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aButtons', null, 0);
$_smarty_tpl->tpl_vars['aButtons']->value[] = array('text'=>'Сообщение','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-but-mess",'icon'=>'envelope','mods'=>"large",'type'=>'button','url'=>$_tmp2);?>
    <?php }?>
    
    
    
    
    <?php echo smarty_function_component(array('_default_short'=>'button.group','classes'=>"fl-profile-contacts",'buttonParams'=>array('mods'=>'large'),'mods'=>'','buttons'=>$_smarty_tpl->tpl_vars['aButtons']->value),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    
<?php if (!($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUser']->value->getId()==$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId())){?>
    <?php echo Smarty::$_smarty_vars['capture']['actions'];?>

<?php }?>
<?php }} ?>