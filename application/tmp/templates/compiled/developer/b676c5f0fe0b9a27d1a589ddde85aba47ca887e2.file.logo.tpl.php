<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/logo/logo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6893724375a4e49ebd263a1-67107362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b676c5f0fe0b9a27d1a589ddde85aba47ca887e2' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/logo/logo.tpl',
      1 => 1513844451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6893724375a4e49ebd263a1-67107362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebd2d3e7_63474815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebd2d3e7_63474815')) {function content_5a4e49ebd2d3e7_63474815($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-logo', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('url')),$_smarty_tpl);?>


<a class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" href="<?php ob_start();?><?php echo Router::GetPathRootWeb();?>
<?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['url']->value)===null||$tmp==='' ? $_tmp1 : $tmp);?>
">
    <img src="<?php echo Plugin::GetWebPath('freelancer');?>
frontend/components/logo/img/logo.png">
</a>
<?php }} ?>