<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:15:46
         compiled from "/var/www/profimaster/application/frontend/components/blog/list/blog-list-loop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11310794485a4631f223b406-20673543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c13f844cc9fb2c250d172a4e3768eb9c71e3f6' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/list/blog-list-loop.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11310794485a4631f223b406-20673543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blogs' => 0,
    'blog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4631f223f6e8_46944819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4631f223f6e8_46944819')) {function content_5a4631f223f6e8_46944819($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('blogs')),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
$_smarty_tpl->tpl_vars['blog']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'blog','template'=>'list-item','blog'=>$_smarty_tpl->tpl_vars['blog']->value),$_smarty_tpl);?>

<?php } ?><?php }} ?>