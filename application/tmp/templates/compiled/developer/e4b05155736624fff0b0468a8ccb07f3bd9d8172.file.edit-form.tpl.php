<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:12
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/edit-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3040154185a46320c8112f1-13814586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4b05155736624fff0b0468a8ccb07f3bd9d8172' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/edit-form.tpl',
      1 => 1510826340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3040154185a46320c8112f1-13814586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oMaster' => 0,
    'aSpecializations' => 0,
    'oOrder' => 0,
    'oSpecialization' => 0,
    'aSpecIds' => 0,
    'specializations' => 0,
    'oUserCurrent' => 0,
    'contentReturn' => 0,
    'oGeoTarget' => 0,
    'aLang' => 0,
    'oUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46320c847af9_64153126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46320c847af9_64153126')) {function content_5a46320c847af9_64153126($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_insert_block')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/insert.block.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-order-edit-form", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oOrder')),$_smarty_tpl);?>


<form action="" method="post" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
"  enctype="multipart/form-data" >
    <?php if ($_smarty_tpl->tpl_vars['oMaster']->value){?>
        <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oMaster']->value->category->getCategories(), null, 0);?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.middle','oUser'=>$_smarty_tpl->tpl_vars['oMaster']->value),$_smarty_tpl);?>

        <?php echo smarty_function_component(array('_default_short'=>'field.hidden','value'=>$_smarty_tpl->tpl_vars['oMaster']->value->getId(),'name'=>'master_id'),$_smarty_tpl);?>

        <?php echo smarty_function_component(array('_default_short'=>'freelancer:specialization-tabs.master','specializations'=>$_smarty_tpl->tpl_vars['aSpecializations']->value),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->category->getCategories(), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['aSpecIds'] = new Smarty_variable(array(), null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['oSpecialization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSpecialization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aSpecializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oSpecialization']->key => $_smarty_tpl->tpl_vars['oSpecialization']->value){
$_smarty_tpl->tpl_vars['oSpecialization']->_loop = true;
?>
            <?php $_smarty_tpl->createLocalArrayVariable('aSpecIds', null, 0);
$_smarty_tpl->tpl_vars['aSpecIds']->value[] = $_smarty_tpl->tpl_vars['oSpecialization']->value->getId();?>            
        <?php } ?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:specialization.tree','specializationSelected'=>$_smarty_tpl->tpl_vars['aSpecIds']->value,'aSpecializations'=>$_smarty_tpl->tpl_vars['specializations']->value,'label'=>"Специализация"),$_smarty_tpl);?>

    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isRoleEmployerSpecializationOrder()&&!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isPro()){?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Добавить еще специализации",'sTargetType'=>"role",'iTargetId'=>"employer_specialization_order"),$_smarty_tpl);?>

    <?php }?>
    
    <?php echo smarty_function_hook(array('run'=>"freelancer_order_form",'assign'=>'contentReturn','target'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['contentReturn']->value){?>
        <?php echo $_smarty_tpl->tpl_vars['contentReturn']->value;?>

    <?php }else{ ?>
        <?php echo smarty_insert_block(array('block' => "defaultGeo", 'params' => array('plugin'=>'freelancer','geo_target'=>$_smarty_tpl->tpl_vars['oGeoTarget']->value)),$_smarty_tpl);?>
 
    <?php }?>
            
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getTitle();?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['form']['order']['title'];?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','value'=>$_tmp1,'name'=>'title','label'=>$_tmp2),$_smarty_tpl);?>

    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getTextAbout();?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['about_order'];?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.textarea','name'=>'text_about','value'=>$_tmp3,'label'=>$_tmp4),$_smarty_tpl);?>

    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getBudjet();?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['form']['order']['budjet'];?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','name'=>'budjet','value'=>$_tmp5,'label'=>$_tmp6,'note'=>"Оставить пустым если договорной"),$_smarty_tpl);?>


    
    
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:media.form','oTarget'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>

    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['save'];?>
<?php $_tmp7=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','text'=>$_tmp7),$_smarty_tpl);?>
    
</form>
<?php echo smarty_function_component(array('_default_short'=>'freelancer:media','oUser'=>$_smarty_tpl->tpl_vars['oUser']->value),$_smarty_tpl);?>
<?php }} ?>