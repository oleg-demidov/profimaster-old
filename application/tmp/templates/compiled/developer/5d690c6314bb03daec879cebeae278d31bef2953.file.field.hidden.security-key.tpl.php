<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/framework/frontend/components/field/field.hidden.security-key.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5187177055a4e49d0cfe789-33003637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d690c6314bb03daec879cebeae278d31bef2953' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/field/field.hidden.security-key.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5187177055a4e49d0cfe789-33003637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0d00694_47121648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0d00694_47121648')) {function content_5a4e49d0d00694_47121648($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden','name'=>'security_ls_key','value'=>$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),$_smarty_tpl);?>
<?php }} ?>