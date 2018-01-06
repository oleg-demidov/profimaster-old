<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:45:05
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/blocks/ref-banner-goriz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17576558045a4e3df1aada21-90917836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf3de6a33b7abedb3c9db9d5caa8269bb8b573db' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/blocks/ref-banner-goriz.tpl',
      1 => 1513163085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17576558045a4e3df1aada21-90917836',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3df1aaf871_63478404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3df1aaf871_63478404')) {function content_5a4e3df1aaf871_63478404($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>
<a href="<?php echo smarty_function_router(array('page'=>'info'),$_smarty_tpl);?>
manager">
    <img style="width:100%;"  src="<?php echo Plugin::GetTemplateWebPath('freelancer');?>
assets/images/ref_banner1200.jpg">
</a><?php }} ?>