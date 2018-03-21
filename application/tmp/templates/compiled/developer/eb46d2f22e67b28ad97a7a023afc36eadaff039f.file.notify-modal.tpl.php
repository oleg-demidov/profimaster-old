<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:59
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13074606725ab20763860d80-66196242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb46d2f22e67b28ad97a7a023afc36eadaff039f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-modal.tpl',
      1 => 1509012309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13074606725ab20763860d80-66196242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2076386a083_61298048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2076386a083_61298048')) {function content_5ab2076386a083_61298048($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-notify-modal', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('classes','content','attributes')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_router(array('page'=>'settings/tuning'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'modal','primaryButton'=>array('icon'=>'edit','url'=>$_tmp1."#settings_tuning",'mods'=>''),'title'=>"Оповещения",'content'=>"<div class='fl-notify-angle'>&#9650;</div><div class='fl-notify-list'> ".((string)$_smarty_tpl->tpl_vars['content']->value)." </div>",'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)." ".((string)$_smarty_tpl->tpl_vars['classes']->value),'attributes'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
<?php }} ?>