<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:09:50
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/actions/ActionAdmin/kbd-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10105819805a46146e77da46-35367296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5662725e1e920b7407a58658f6766ce6107dbaf8' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/actions/ActionAdmin/kbd-list.tpl',
      1 => 1514188944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10105819805a46146e77da46-35367296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aPosts' => 0,
    'oPost' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46146e783116_16187469',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46146e783116_16187469')) {function content_5a46146e783116_16187469($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>
<h1>Статьи</h1>
<?php  $_smarty_tpl->tpl_vars['oPost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oPost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aPosts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oPost']->key => $_smarty_tpl->tpl_vars['oPost']->value){
$_smarty_tpl->tpl_vars['oPost']->_loop = true;
?>
    <a href="<?php echo smarty_function_router(array('page'=>"admin/plugin/freelancer/kbd/post"),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['oPost']->value->_getDataOne('ID');?>
"><?php echo $_smarty_tpl->tpl_vars['oPost']->value->getPostTitle();?>
</a><br>
<?php } ?><?php }} ?>