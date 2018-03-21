<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/avatar/user-avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7475101275aaf4e50205318-33888051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6513dc3221514af5e3f77a9eb3fd898e05b823af' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/avatar/user-avatar.tpl',
      1 => 1510393130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7475101275aaf4e50205318-33888051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'size' => 0,
    'sizes' => 0,
    'user' => 0,
    'classes' => 0,
    'component' => 0,
    'isName' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e50213103_70522357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e50213103_70522357')) {function content_5aaf4e50213103_70522357($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-avatar", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('user','size','classes','isName'=>1)),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['sizes'] = new Smarty_variable(array('xxlarge'=>500,'xlarge'=>300,'large'=>200,'default'=>100,'small'=>64,'xsmall'=>48,'xxsmall'=>24,'text'=>24), null, 0);?>

<?php echo smarty_function_component(array('_default_short'=>'avatar','image'=>$_smarty_tpl->tpl_vars['user']->value->getProfileAvatarPath($_smarty_tpl->tpl_vars['sizes']->value[(($tmp = @$_smarty_tpl->tpl_vars['size']->value)===null||$tmp==='' ? 'default' : $tmp)]),'url'=>$_smarty_tpl->tpl_vars['user']->value->getUserWebPath(),'classes'=>((string)$_smarty_tpl->tpl_vars['classes']->value).((string)$_smarty_tpl->tpl_vars['component']->value),'name'=>$_smarty_tpl->tpl_vars['isName']->value ? $_smarty_tpl->tpl_vars['user']->value->getProfileName() : '','params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>
<?php }} ?>