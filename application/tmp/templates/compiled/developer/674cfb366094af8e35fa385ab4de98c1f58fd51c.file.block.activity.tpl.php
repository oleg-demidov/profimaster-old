<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:32:09
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1485886805a4e48f9a37666-59595477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '674cfb366094af8e35fa385ab4de98c1f58fd51c' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.activity.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1485886805a4e48f9a37666-59595477',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'events' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e48f9a3c5a7_09199887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e48f9a3c5a7_09199887')) {function content_5a4e48f9a3c5a7_09199887($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('events','count')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'activity','events'=>$_smarty_tpl->tpl_vars['events']->value,'count'=>$_smarty_tpl->tpl_vars['count']->value,'classes'=>'p-dashboard-activity js-dashboard-activity'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'admin:block','title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['activity'],'content'=>$_tmp1),$_smarty_tpl);?>
<?php }} ?>