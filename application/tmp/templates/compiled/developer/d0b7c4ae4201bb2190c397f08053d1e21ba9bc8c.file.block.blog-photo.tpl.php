<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8214924995a462de6974862-77194327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0b7c4ae4201bb2190c397f08053d1e21ba9bc8c' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-photo.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8214924995a462de6974862-77194327',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blog' => 0,
    'blockContent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de697ea61_77692090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de697ea61_77692090')) {function content_5a462de697ea61_77692090($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component(array('_default_short'=>'photo','classes'=>'js-blog-avatar','useAvatar'=>false,'hasPhoto'=>$_smarty_tpl->tpl_vars['blog']->value->getAvatar(),'editable'=>$_smarty_tpl->tpl_vars['blog']->value->isAllowEdit(),'targetId'=>$_smarty_tpl->tpl_vars['blog']->value->getId(),'url'=>$_smarty_tpl->tpl_vars['blog']->value->getUrlFull(),'photoPath'=>$_smarty_tpl->tpl_vars['blog']->value->getAvatarBig(),'photoAltText'=>htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value->getTitle(), ENT_QUOTES, 'UTF-8', true),'assign'=>'blockContent'),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'nopadding transparent blog-photo','content'=>$_smarty_tpl->tpl_vars['blockContent']->value),$_smarty_tpl);?>
<?php }} ?>