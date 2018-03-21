<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:23:20
         compiled from "/var/www/profimaster/application/plugins/sociality/frontend/components/profile/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20069705675ab0fd387af6f5-41760009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75cda6d23cc9145188ab9a6a53c682696623c8b1' => 
    array (
      0 => '/var/www/profimaster/application/plugins/sociality/frontend/components/profile/profile.tpl',
      1 => 1521539739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20069705675ab0fd387af6f5-41760009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oProfileData' => 0,
    'sProvider' => 0,
    'sAttach' => 0,
    'sAttachText' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0fd387caa01_82177404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0fd387caa01_82177404')) {function content_5ab0fd387caa01_82177404($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("profile", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oProfileData','sProvider','sAttach','sAttachText')),$_smarty_tpl);?>


<style>
    .soc-profile-image{
        width:120px;
    }
</style>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'info-list','list'=>array(array('label'=>'Провайдер:','content'=>$_smarty_tpl->tpl_vars['sProvider']->value),array('label'=>'Идентификатор:','content'=>$_smarty_tpl->tpl_vars['oProfileData']->value->identifier),array('label'=>'Email:','content'=>$_smarty_tpl->tpl_vars['oProfileData']->value->email))),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'item','title'=>((string)$_smarty_tpl->tpl_vars['oProfileData']->value->firstName)." ".((string)$_smarty_tpl->tpl_vars['oProfileData']->value->lastName),'desc'=>$_tmp1,'image'=>array('path'=>$_smarty_tpl->tpl_vars['oProfileData']->value->photoURL,'classes'=>"soc-profile-image")),$_smarty_tpl);?>
<br>
    <?php if ($_smarty_tpl->tpl_vars['sAttach']->value){?>
        <?php echo smarty_function_component(array('_default_short'=>'alert','title'=>$_smarty_tpl->tpl_vars['sAttach']->value,'visible'=>true,'text'=>$_smarty_tpl->tpl_vars['sAttachText']->value),$_smarty_tpl);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('footer', null, null); ob_start(); ?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"sociality/reset_profile"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>"plugin.sociality.auth.profile.cancel_profile"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','url'=>$_tmp2,'text'=>$_tmp3),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['sAttach']->value){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"sociality/attach_profile"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>"plugin.sociality.auth.profile.attach_button",'params'=>array('provider'=>$_smarty_tpl->tpl_vars['sProvider']->value)),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>"success",'url'=>$_tmp4,'text'=>$_tmp5),$_smarty_tpl);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_lang(array('name'=>"plugin.sociality.auth.profile.social_profile"),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','title'=>$_tmp6,'content'=>Smarty::$_smarty_vars['capture']['content'],'footer'=>Smarty::$_smarty_vars['capture']['footer']),$_smarty_tpl);?>
<?php }} ?>