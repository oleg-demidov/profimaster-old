<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/blocks/ref-banner-vert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3594265685a4e3dca0b1586-26277113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c8c46e7c8cf2bc3ddcfbcea19a6d61a79f8a3a8' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/blocks/ref-banner-vert.tpl',
      1 => 1513158550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3594265685a4e3dca0b1586-26277113',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3dca0b3876_11628705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3dca0b3876_11628705')) {function content_5a4e3dca0b3876_11628705($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>
<a href="<?php echo smarty_function_router(array('page'=>'info'),$_smarty_tpl);?>
manager">
    <img style="width:100%;"  src="<?php echo Plugin::GetTemplateWebPath('freelancer');?>
assets/images/ref_banner400.jpg">
</a><?php }} ?>