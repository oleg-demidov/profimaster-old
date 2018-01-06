<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/blog/blocks/block.blogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12285661825a4634f82524e4-53796093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fd4e6507397db50d2b3ab7752e0dfb6aad066e4' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/blog/blocks/block.blogs.tpl',
      1 => 1514540711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12285661825a4634f82524e4-53796093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'sBlogsTop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f8268996_22645659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f8268996_22645659')) {function content_5a4634f8268996_22645659($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('actionbar', null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'blog/add'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'content/add/topic'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>'createblog','mods'=>"compact blogcreate",'items'=>array(array('buttons'=>array(array('url'=>$_tmp1,'text'=>'Создать блог','mods'=>'primary large'))),array('buttons'=>array(array('url'=>$_tmp2,'text'=>'Создать топик','mods'=>'success large'))))),$_smarty_tpl);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
 
<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.blogs.title'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'blogs'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.blogs.nav.top'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'ajax'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.blogs.nav.joined'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'ajax'),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.blogs.nav.self'),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'ajax'),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo trim(Smarty::$_smarty_vars['capture']['actionbar']);?>
<?php $_tmp11=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'blogs','classes'=>'blog-block-blogs js-block-default','title'=>$_tmp3." ",'titleUrl'=>$_tmp4,'tabs'=>array('classes'=>'js-tabs-block','tabs'=>array(array('text'=>$_tmp5,'url'=>$_tmp6."blogs/top",'list'=>$_smarty_tpl->tpl_vars['sBlogsTop']->value),array('text'=>$_tmp7,'url'=>$_tmp8."blogs/join",'is_enabled'=>!!$_smarty_tpl->tpl_vars['oUserCurrent']->value),array('text'=>$_tmp9,'url'=>$_tmp10."blogs/self",'is_enabled'=>!!$_smarty_tpl->tpl_vars['oUserCurrent']->value))),'footer'=>$_tmp11),$_smarty_tpl);?>
<?php }} ?>