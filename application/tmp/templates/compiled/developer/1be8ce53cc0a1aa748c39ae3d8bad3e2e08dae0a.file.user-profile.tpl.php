<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/user-profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15195337955a4e49ebe97635-50286509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1be8ce53cc0a1aa748c39ae3d8bad3e2e08dae0a' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/user-profile.tpl',
      1 => 1511442564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15195337955a4e49ebe97635-50286509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oUser' => 0,
    'oUserCurrent' => 0,
    'aGeo' => 0,
    'aSpecializations' => 0,
    'oSpec' => 0,
    'sTitleSpec' => 0,
    'sGeoUrl' => 0,
    'aList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebec7121_44158628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebec7121_44158628')) {function content_5a4e49ebec7121_44158628($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-profile', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','mods','classes','attributes')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info">
    <h3>
        <a href="<?php echo $_smarty_tpl->tpl_vars['oUser']->value->getUserWebPath();?>
"><?php echo $_smarty_tpl->tpl_vars['oUser']->value->getProfileName();?>
</a> 
        (<?php echo smarty_function_lang(array('name'=>"plugin.freelancer.user_role.".((string)$_smarty_tpl->tpl_vars['oUser']->value->getStrRole())),$_smarty_tpl);?>
)
        <?php if ($_smarty_tpl->tpl_vars['oUser']->value->getPro()){?>
            <?php echo smarty_function_component(array('_default_short'=>'badge','mods'=>"warning large",'value'=>((string)$_smarty_tpl->tpl_vars['oUser']->value->getPro())),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUser']->value->getId()==$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()&&!$_smarty_tpl->tpl_vars['oUser']->value->isManager()){?>
                <?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Купить Pro"),$_smarty_tpl);?>

            <?php }?>
        <?php }?>
        <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-rating"><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'star-o'),$_smarty_tpl);?>
 Рейтинг: <b><?php echo $_smarty_tpl->tpl_vars['oUser']->value->getRating();?>
</b></span>   
    </h3>
    
    <?php $_smarty_tpl->tpl_vars['aGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->ygeo->getGeo(), null, 0);?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/search?ygeo=".((string)$_smarty_tpl->tpl_vars['aGeo']->value->getId())),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sGeoUrl'] = new Smarty_variable($_tmp1, null, 0);?>
    
    <?php $_smarty_tpl->_capture_stack[0][] = array('get_specializations', null, null); ob_start(); ?>
        <?php if ($_smarty_tpl->tpl_vars['oUser']->value){?>
            <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->category->getCategories(), null, 0);?>
            <?php if (!sizeof($_smarty_tpl->tpl_vars['aSpecializations']->value)){?>
                <a href="<?php echo smarty_function_router(array('page'=>'settings/specialization'),$_smarty_tpl);?>
">Выбрать</a>
            <?php }?>
            <?php  $_smarty_tpl->tpl_vars['oSpec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSpec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aSpecializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oSpec']->key => $_smarty_tpl->tpl_vars['oSpec']->value){
$_smarty_tpl->tpl_vars['oSpec']->_loop = true;
?>
                <a href='<?php echo smarty_function_router(array('page'=>"user/search/?specialization[]=".((string)$_smarty_tpl->tpl_vars['oSpec']->value->getId())),$_smarty_tpl);?>
'>
                <?php $_smarty_tpl->tpl_vars['sTitleSpec'] = new Smarty_variable($_smarty_tpl->tpl_vars['oSpec']->value->getDescription() ? $_smarty_tpl->tpl_vars['oSpec']->value->getDescription() : $_smarty_tpl->tpl_vars['oSpec']->value->getTitle(), null, 0);?><?php echo $_smarty_tpl->tpl_vars['sTitleSpec']->value;?>
</a><br>
            <?php } ?>            
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->tpl_vars['aList'] = new Smarty_variable(array(array('label'=>"Местоположение:",'icon'=>'map-marker','content'=>"<a href='".((string)$_smarty_tpl->tpl_vars['sGeoUrl']->value)."'>".((string)$_smarty_tpl->tpl_vars['aGeo']->value->getGeoRegionName())."</a>"),array('label'=>"Дата регистрации:",'icon'=>'calendar','content'=>((string)$_smarty_tpl->tpl_vars['oUser']->value->getDateRegister()))), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['oUser']->value->isMaster()){?>
        <?php ob_start();?><?php echo Smarty::$_smarty_vars['capture']['get_specializations'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aList', null, 0);
$_smarty_tpl->tpl_vars['aList']->value[] = array('label'=>"Специализация:",'icon'=>'address-card-o','content'=>$_tmp2);?>
    <?php }?>
    <?php echo smarty_function_component(array('_default_short'=>'info-list','mods'=>"large",'list'=>$_smarty_tpl->tpl_vars['aList']->value),$_smarty_tpl);?>
   
    
    
</div><?php }} ?>