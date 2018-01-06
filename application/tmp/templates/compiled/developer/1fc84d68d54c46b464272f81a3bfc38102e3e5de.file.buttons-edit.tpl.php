<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/response/buttons-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10467800655a4a11c6e96610-35316605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fc84d68d54c46b464272f81a3bfc38102e3e5de' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/response/buttons-edit.tpl',
      1 => 1502266684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10467800655a4a11c6e96610-35316605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oResponse' => 0,
    'aButs' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11c6eab706_80138855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11c6eab706_80138855')) {function content_5a4a11c6eab706_80138855($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-response-buttons-edit", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oResponse','back')),$_smarty_tpl);?>

<?php ob_start();?><?php echo smarty_function_router(array('page'=>"freelancer/response/edit"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo ($_tmp1).($_smarty_tpl->tpl_vars['oResponse']->value->getId());?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oResponse']->value->getId();?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aButs'] = new Smarty_variable(array(array('text'=>'Редактировать','type'=>"button",'mods'=>'primary','icon'=>'edit','url'=>$_tmp2),array('text'=>'Удалить','type'=>"button",'mods'=>'danger','icon'=>'trash-o','classes'=>'js-response-remove-button-toggle','attributes'=>array('data-id'=>$_tmp3,'data-lsmodaltoggle-modal'=>"response-remove-modal".((string)$_smarty_tpl->tpl_vars['oResponse']->value->getId())))), null, 0);?>  
<?php echo smarty_function_component(array('_default_short'=>'button.group','buttons'=>$_smarty_tpl->tpl_vars['aButs']->value),$_smarty_tpl);?>

<?php ob_start();?><?php echo smarty_function_router(array('page'=>"freelancer/response/remove/".((string)$_smarty_tpl->tpl_vars['oResponse']->value->getId())."?back=".((string)$_smarty_tpl->tpl_vars['back']->value)),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'modal','title'=>"Вы действительно хотите удалить отклик",'content'=>$_smarty_tpl->tpl_vars['oResponse']->value->getText(),'id'=>"response-remove-modal".((string)$_smarty_tpl->tpl_vars['oResponse']->value->getId()),'classes'=>'js-confirm-response-remove','primaryButton'=>array('text'=>'Удалить','type'=>"button",'icon'=>'trash-o','mods'=>'danger','url'=>$_tmp4)),$_smarty_tpl);?>
<?php }} ?>