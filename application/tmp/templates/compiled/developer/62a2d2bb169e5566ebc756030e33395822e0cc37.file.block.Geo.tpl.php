<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/blocks/block.Geo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7640788965a4e49d099bbb4-63123492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a2d2bb169e5566ebc756030e33395822e0cc37' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/blocks/block.Geo.tpl',
      1 => 1502702619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7640788965a4e49d099bbb4-63123492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aGeoItems' => 0,
    'selectedItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d099e813_29259297',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d099e813_29259297')) {function content_5a4e49d099e813_29259297($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.place.label'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'ydirect:geo','label'=>$_tmp1,'aGeoItems'=>$_smarty_tpl->tpl_vars['aGeoItems']->value,'selectedItem'=>$_smarty_tpl->tpl_vars['selectedItem']->value),$_smarty_tpl);?>

<?php }} ?>