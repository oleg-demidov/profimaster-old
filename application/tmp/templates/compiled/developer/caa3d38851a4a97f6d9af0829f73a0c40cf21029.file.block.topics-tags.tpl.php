<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/application/frontend/components/topic/blocks/block.topics-tags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18643706425a4634f83742e5-86880413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa3d38851a4a97f6d9af0829f73a0c40cf21029' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/topic/blocks/block.topics-tags.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18643706425a4634f83742e5-86880413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tagsUser' => 0,
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f837e622_88055913',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f837e622_88055913')) {function content_5a4634f837e622_88055913($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('tags','tagsUser')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'tags.block_tags.title'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'tags','template'=>'search-form','mods'=>'light'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'tags.block_tags.nav.all'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'tags','template'=>'cloud','tags'=>$_smarty_tpl->tpl_vars['tags']->value),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'tags.block_tags.nav.favourite'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'tags','template'=>'cloud','tags'=>$_smarty_tpl->tpl_vars['tagsUser']->value),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','title'=>$_tmp1,'classes'=>'js-block-default','footer'=>$_tmp2,'tabs'=>array('tabs'=>array(array('text'=>$_tmp3,'content'=>$_tmp4),array('text'=>$_tmp5,'content'=>$_tmp6,'is_enabled'=>!!$_smarty_tpl->tpl_vars['oUserCurrent']->value)))),$_smarty_tpl);?>
<?php }} ?>