<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-actionbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10208857145a4e3dca72a6a6-75411627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c5cf3cab2be3b534c62f814b7ddff59af81856a' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-actionbar.tpl',
      1 => 1510823820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10208857145a4e3dca72a6a6-75411627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'oMaster' => 0,
    'component' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3dca748066_58009054',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3dca748066_58009054')) {function content_5a4e3dca748066_58009054($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-master-actionbar", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oMaster')),$_smarty_tpl);?>




<?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isEmployer()){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'talk/add'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"order/add/?master_id=".((string)$_smarty_tpl->tpl_vars['oMaster']->value->getId())),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'envelope-o','text'=>'Написать','url'=>$_tmp1."?talk_recepient_id=".((string)$_smarty_tpl->tpl_vars['oMaster']->value->getId())),array('icon'=>'file-text','mods'=>'success','text'=>'Предложить заказ','url'=>$_tmp2)));?>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['oMaster']->value->getId()==$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()&&!$_smarty_tpl->tpl_vars['oMaster']->value->isMasterTop()){?>
            <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Поднять наверх",'sTargetType'=>"role",'iTargetId'=>"master_master_top"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array($_tmp3));?>
        <?php }?>
    <?php }?>
<?php }else{ ?>
    <?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('icon'=>'envelope-o','text'=>'Написать','type'=>'button','classes'=>'js-modal-toggle-login'),array('icon'=>'file-text','mods'=>'success','text'=>'Предложить заказ','type'=>'button','classes'=>'js-modal-toggle-login')));?>
    
<?php }?>
    
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getUserWebPath();?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('buttons'=>array(array('mods'=>'primary','text'=>'Подробнее','url'=>$_tmp4)));?>

<?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>

<?php }} ?>