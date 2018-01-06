<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/user/avatar/user-avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15119033975a4e49ebd7ffe4-98428556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33923ffeb512c36c2e65731ff23d762c1b0e3dee' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/user/avatar/user-avatar.tpl',
      1 => 1508573674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15119033975a4e49ebd7ffe4-98428556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'size' => 0,
    'sizes' => 0,
    'user' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebd898e3_42365012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebd898e3_42365012')) {function content_5a4e49ebd898e3_42365012($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('user','size')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['sizes'] = new Smarty_variable(array('large'=>200,'default'=>100,'small'=>64,'xsmall'=>48,'xxsmall'=>24,'text'=>24), null, 0);?>

<?php echo smarty_function_component(array('_default_short'=>'avatar','image'=>$_smarty_tpl->tpl_vars['user']->value->getProfileAvatarPath($_smarty_tpl->tpl_vars['sizes']->value[(($tmp = @$_smarty_tpl->tpl_vars['size']->value)===null||$tmp==='' ? 'default' : $tmp)]),'url'=>$_smarty_tpl->tpl_vars['user']->value->getUserWebPath(),'classes'=>'user-item','name'=>$_smarty_tpl->tpl_vars['user']->value->getDisplayName(),'params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>
<?php }} ?>