<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-mini.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815679685a4a11c6df3743-70798534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f8d1241d4b6c2e05d2c841d8ba5b397bf429618' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-mini.tpl',
      1 => 1510482777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815679685a4a11c6df3743-70798534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oOrder' => 0,
    'oMedia' => 0,
    'component' => 0,
    'Image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11c6e0a5b0_99940679',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11c6e0a5b0_99940679')) {function content_5a4a11c6e0a5b0_99940679($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('freelancer-order-mini', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oOrder','mods')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->media->getMediaOne(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['oMedia']->value){?>
    <?php $_smarty_tpl->tpl_vars['Image'] = new Smarty_variable(array('path'=>$_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath('100x100crop')), null, 0);?>
<?php }?>


<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['component']->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'text','text'=>$_smarty_tpl->tpl_vars['oOrder']->value->getCropText()),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'item','classes'=>$_tmp1,'title'=>$_smarty_tpl->tpl_vars['oOrder']->value->getTitle(),'titleUrl'=>$_smarty_tpl->tpl_vars['oOrder']->value->_getUrlView(),'desc'=>$_tmp2,'image'=>$_smarty_tpl->tpl_vars['Image']->value),$_smarty_tpl);?>
<?php }} ?>