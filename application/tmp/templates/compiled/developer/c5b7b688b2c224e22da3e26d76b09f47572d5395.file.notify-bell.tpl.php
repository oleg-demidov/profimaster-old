<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-bell.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18041340295a4e49ebe15139-14825659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b7b688b2c224e22da3e26d76b09f47572d5395' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-bell.tpl',
      1 => 1509012916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18041340295a4e49ebe15139-14825659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebe1e422_57538328',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebe1e422_57538328')) {function content_5a4e49ebe1e422_57538328($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-notify-bell', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','mods','back','attributes','count')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'nav','template'=>'item','mods'=>"bell",'isRoot'=>1,'activeItem'=>1,'isActive'=>0,'params'=>array('icon'=>'bell','classes'=>'js-fl-notify-bell-toggle','attributes'=>array('data-lsmodaltoggle-modal'=>"js-fl-notify-modal"),'count'=>$_smarty_tpl->tpl_vars['count']->value)),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'freelancer:notify.modal','attributes'=>array('id'=>'js-fl-notify-modal')),$_smarty_tpl);?>

<?php }} ?>