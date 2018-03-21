<?php /* Smarty version Smarty-3.1.13, created on 2018-03-16 23:46:55
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14179350975aac030face6a1-87971194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fca0a410cb515f79251772abb2de69c1974f6c4' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-item.tpl',
      1 => 1519718600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14179350975aac030face6a1-87971194',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oMaster' => 0,
    'mods' => 0,
    'component' => 0,
    'aWorks' => 0,
    'aSpecializations' => 0,
    'oSpecialization' => 0,
    'oGeo' => 0,
    'sGeo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aac030fb054f0_06112411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aac030fb054f0_06112411')) {function content_5aac030fb054f0_06112411($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-master-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oMaster','mods','back')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['oMaster']->value->isMasterTop()){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." success", null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-block">
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.avatar','user'=>$_smarty_tpl->tpl_vars['oMaster']->value,'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-avatar"),$_smarty_tpl);?>

    </div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-block">
        <a class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-name" href="<?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getUserWebPath();?>
">
            <?php if ($_smarty_tpl->tpl_vars['oMaster']->value->getProfileName()){?><?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getProfileName();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getLogin();?>
<?php }?></a>
        <?php echo smarty_function_component(array('_default_short'=>'badge','value'=>$_smarty_tpl->tpl_vars['oMaster']->value->getPro(),'mods'=>"warning"),$_smarty_tpl);?>

        <?php $_smarty_tpl->tpl_vars['aWorks'] = new Smarty_variable($_smarty_tpl->tpl_vars['oMaster']->value->getWorks(3), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['aWorks']->value){?>
            <?php echo smarty_function_component(array('_default_short'=>'freelancer:portfolio.work.small.list','aWorks'=>$_smarty_tpl->tpl_vars['aWorks']->value,'attributes'=>array('data-group'=>"group".((string)$_smarty_tpl->tpl_vars['oMaster']->value->getId()))),$_smarty_tpl);?>

        <?php }?>
    </div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-block-right">
        <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-rating"><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'star','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-rating-icon"),$_smarty_tpl);?>
 Рейтинг: <b><?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getRating();?>
</b></span>
    </div>
    
    <?php $_smarty_tpl->_capture_stack[0][] = array('specializations', null, null); ob_start(); ?>
        <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oMaster']->value->category->getCategories(), null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['oSpecialization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSpecialization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aSpecializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['oSpecialization']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['oSpecialization']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['oSpecialization']->key => $_smarty_tpl->tpl_vars['oSpecialization']->value){
$_smarty_tpl->tpl_vars['oSpecialization']->_loop = true;
 $_smarty_tpl->tpl_vars['oSpecialization']->iteration++;
 $_smarty_tpl->tpl_vars['oSpecialization']->last = $_smarty_tpl->tpl_vars['oSpecialization']->iteration === $_smarty_tpl->tpl_vars['oSpecialization']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['specs']['last'] = $_smarty_tpl->tpl_vars['oSpecialization']->last;
?>
            <?php if ($_smarty_tpl->tpl_vars['oSpecialization']->value->getDescription()){?>
                <?php echo $_smarty_tpl->tpl_vars['oSpecialization']->value->getDescription();?>

            <?php }else{ ?>
                <?php echo $_smarty_tpl->tpl_vars['oSpecialization']->value->getTitle();?>

            <?php }?>
            <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['specs']['last']){?>
                ,&nbsp;
            <?php }?>
        <?php } ?>
        <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aSpecializations']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
            Не выбрано
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    
    <div class="ls-grid-row <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-spec-geo">
        <div class="ls-grid-col ls-grid-col-6">
        <?php echo smarty_function_component(array('_default_short'=>'info-list','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-spec",'list'=>array(array('label'=>'Специализация:','icon'=>'address-card-o','content'=>Smarty::$_smarty_vars['capture']['specializations']))),$_smarty_tpl);?>

        </div>
        <div class="ls-grid-col ls-grid-col-6">
        <?php $_smarty_tpl->tpl_vars['oGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oMaster']->value->ygeo->getGeo(), null, 0);?> 
        <?php if ($_smarty_tpl->tpl_vars['oGeo']->value){?>
            <?php $_smarty_tpl->tpl_vars['sGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oGeo']->value->getGeoRegionName(), null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['sGeo'] = new Smarty_variable("Не выбрано", null, 0);?>
        <?php }?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:modal-map','text'=>$_smarty_tpl->tpl_vars['sGeo']->value,'oGeo'=>$_smarty_tpl->tpl_vars['oMaster']->value->ymaps->getGeo()),$_smarty_tpl);?>

        </div>
    </div>
        
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('footer', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:master.actionbar','oMaster'=>$_smarty_tpl->tpl_vars['oMaster']->value),$_smarty_tpl);?>

    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>$_smarty_tpl->tpl_vars['mods']->value,'classes'=>$_tmp2." ".((string)$_smarty_tpl->tpl_vars['component']->value),'content'=>Smarty::$_smarty_vars['capture']['content'],'footer'=>Smarty::$_smarty_vars['capture']['footer']),$_smarty_tpl);?>

<?php }} ?>