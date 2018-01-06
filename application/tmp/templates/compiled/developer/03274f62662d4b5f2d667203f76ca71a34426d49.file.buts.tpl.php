<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:48
         compiled from "/var/www/profimaster/application/plugins/sociality/frontend/components/buts/buts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13552653535a4e3de00d57f1-12880540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03274f62662d4b5f2d667203f76ca71a34426d49' => 
    array (
      0 => '/var/www/profimaster/application/plugins/sociality/frontend/components/buts/buts.tpl',
      1 => 1514890074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13552653535a4e3de00d57f1-12880540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aButtonsNames' => 0,
    'but' => 0,
    'sUriPluginSkin' => 0,
    'sSizeButton' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3de00e00e3_96607982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3de00e00e3_96607982')) {function content_5a4e3de00e00e3_96607982($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("soc-buts", null, 0);?>
<?php $_smarty_tpl->_capture_stack[0][] = array('buttons', null, null); ob_start(); ?>
<?php  $_smarty_tpl->tpl_vars['but'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['but']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aButtonsNames']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['but']->key => $_smarty_tpl->tpl_vars['but']->value){
$_smarty_tpl->tpl_vars['but']->_loop = true;
?>
    <a style="margin:2px;" href=<?php echo smarty_function_router(array('page'=>"oauth/".((string)$_smarty_tpl->tpl_vars['but']->value)),$_smarty_tpl);?>
 title="<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
">
        <img src="<?php echo $_smarty_tpl->tpl_vars['sUriPluginSkin']->value;?>
/img/<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['sSizeButton']->value;?>
.png"/></a> 
<?php } ?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'content'=>Smarty::$_smarty_vars['capture']['buttons'],'title'=>"Вход через соцсети:"),$_smarty_tpl);?>
<?php }} ?>