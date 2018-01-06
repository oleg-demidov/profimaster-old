<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14932079965a462de6a5ff36-82305018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c0e7b5cbcd0cd1415c9b75064e6bb71903c6ce' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-users.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14932079965a462de6a5ff36-82305018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'countBlogUsers' => 0,
    'titleLang' => 0,
    'blog' => 0,
    'blogUsers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de6a6b4e8_88340940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de6a6b4e8_88340940')) {function content_5a462de6a6b4e8_88340940($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('titleLang')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('block_title', null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->tpl_vars['countBlogUsers']->value;?>
 <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titleLang']->value)===null||$tmp==='' ? 'blog.readers_declension' : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_lang(array('_default_short'=>$_tmp1,'count'=>$_smarty_tpl->tpl_vars['countBlogUsers']->value,'plural'=>true),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['countBlogUsers']->value){?>
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'user','template'=>'avatar-list','users'=>$_smarty_tpl->tpl_vars['blogUsers']->value,'blankslateParams'=>array('mods'=>'no-background')),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'blog-users','title'=>Smarty::$_smarty_vars['capture']['block_title'],'titleUrl'=>((string)$_smarty_tpl->tpl_vars['blog']->value->getUrlFull())."users/",'content'=>$_tmp2),$_smarty_tpl);?>

<?php }?><?php }} ?>