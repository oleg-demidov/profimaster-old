<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:10:43
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/actions/ActionAdmin/kbd-post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7630408835a4614a3bdfbb9-92497245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f70ae5d9a185a5b10e0f026919136b9b40b5676' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/actions/ActionAdmin/kbd-post.tpl',
      1 => 1514189164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7630408835a4614a3bdfbb9-92497245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oPost' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4614a3be3214_07879858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4614a3be3214_07879858')) {function content_5a4614a3be3214_07879858($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<h1><?php echo $_smarty_tpl->tpl_vars['oPost']->value->getPostTitle();?>
</h1>
<?php echo smarty_function_component(array('_default_short'=>'text','text'=>$_smarty_tpl->tpl_vars['oPost']->value->getPostContent()),$_smarty_tpl);?>

<?php }} ?>