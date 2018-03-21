<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:25
         compiled from "/var/www/profimaster/application/plugins/sociality/frontend/components/buts/buts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9493849055ab20741586f89-67719326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03274f62662d4b5f2d667203f76ca71a34426d49' => 
    array (
      0 => '/var/www/profimaster/application/plugins/sociality/frontend/components/buts/buts.tpl',
      1 => 1521534601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9493849055ab20741586f89-67719326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aButs' => 0,
    'button' => 0,
    'component' => 0,
    'sType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab20741593935_99742498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab20741593935_99742498')) {function content_5ab20741593935_99742498($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("soc-buts", null, 0);?>

<?php echo smarty_function_component_define_params(array('params'=>array('aButs','classes')),$_smarty_tpl);?>

<?php $_smarty_tpl->_capture_stack[0][] = array('buttons', null, null); ob_start(); ?>
    <?php  $_smarty_tpl->tpl_vars['button'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['button']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aButs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['button']->key => $_smarty_tpl->tpl_vars['button']->value){
$_smarty_tpl->tpl_vars['button']->_loop = true;
?>
        <a style="margin:2px;" href="<?php echo $_smarty_tpl->tpl_vars['button']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['button']->value['title'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['button']->value['title'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['button']->value['img'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['button']->value['title'];?>
"/>
        </a> 
    <?php } ?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_lang(array('name'=>"plugin.sociality.auth.buts.title.".((string)$_smarty_tpl->tpl_vars['sType']->value)),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'content'=>Smarty::$_smarty_vars['capture']['buttons'],'title'=>$_tmp1),$_smarty_tpl);?>
<?php }} ?>