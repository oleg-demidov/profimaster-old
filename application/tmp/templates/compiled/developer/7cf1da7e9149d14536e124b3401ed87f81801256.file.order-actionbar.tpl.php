<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 14:33:00
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-actionbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15959028295aa8de3ca4fde5-80268543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cf1da7e9149d14536e124b3401ed87f81801256' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-actionbar.tpl',
      1 => 1510481725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15959028295aa8de3ca4fde5-80268543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'oOrder' => 0,
    'component' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa8de3ca7e5f5_59999947',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8de3ca7e5f5_59999947')) {function content_5aa8de3ca7e5f5_59999947($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-order-actionbar", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oOrder')),$_smarty_tpl);?>




<?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isMaster()){?>
        <?php if ($_smarty_tpl->tpl_vars['oOrder']->value->isCanBid($_smarty_tpl->tpl_vars['oUserCurrent']->value)){?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'envelope-o','text'=>'Откликнуться','mods'=>'success','url'=>$_tmp1.((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId())."#form-bid")));?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['oOrder']->value->getStatus()=='master_wait'){?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'check','mods'=>'success','text'=>'Принять','url'=>$_tmp2.((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId()))));?>
        <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['oOrder']->value->isCreator($_smarty_tpl->tpl_vars['oUserCurrent']->value)){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order/search'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"order/edit/".((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId())."?back=".$_tmp3),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'order/search'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"order/remove/".((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId())."?back=".$_tmp5),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'edit','url'=>$_tmp4,'text'=>'Редактировать'),array('icon'=>'trash','mods'=>'danger','text'=>'Удалить','classes'=>' js-remove-order-confirm','url'=>$_tmp6)));?>
        <?php if (!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isOrdersTop()&&$_smarty_tpl->tpl_vars['oOrder']->value->getStatus()=='publish'){?>
            <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Поднять наверх"),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array($_tmp7));?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['oOrder']->value->getStatus()=='start'){?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order'),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'check','mods'=>'success','text'=>'Завершить','url'=>$_tmp8.((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId()))));?>
        <?php }?>
        
    <?php }?>
<?php }else{ ?>
    
<?php }?>
    
<?php ob_start();?><?php echo smarty_function_router(array('page'=>'order'),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('mods'=>'primary','text'=>'Подробнее','url'=>$_tmp9.((string)$_smarty_tpl->tpl_vars['oOrder']->value->getId()))));?>
<?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>

<?php }} ?>