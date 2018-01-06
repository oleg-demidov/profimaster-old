<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:14
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19213340985a4e49ee0fa289-86257269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '201882455fefe7a5f7a2e6175c9b5a3eb747f3a0' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-buttons.tpl',
      1 => 1502681435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19213340985a4e49ee0fa289-86257269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'attributes' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ee1006e9_39969291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ee1006e9_39969291')) {function content_5a4e49ee1006e9_39969291($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-notify-buttons', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oNotify','mods','back','attributes')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'button.group','attributes'=>$_smarty_tpl->tpl_vars['attributes']->value,'buttons'=>array(array('text'=>'Скрыть','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-hide",'mods'=>"xsmall primary"))),$_smarty_tpl);?>

<?php }} ?>