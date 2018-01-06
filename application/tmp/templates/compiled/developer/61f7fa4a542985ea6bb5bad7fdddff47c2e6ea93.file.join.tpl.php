<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:15:46
         compiled from "/var/www/profimaster/application/frontend/components/blog/join.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17896414565a4631f226ab09-69889139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61f7fa4a542985ea6bb5bad7fdddff47c2e6ea93' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/join.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17896414565a4631f226ab09-69889139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'blog' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4631f2288947_53312078',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4631f2288947_53312078')) {function content_5a4631f2288947_53312078($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('blog')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()!=$_smarty_tpl->tpl_vars['blog']->value->getOwnerId()&&$_smarty_tpl->tpl_vars['blog']->value->getType()=='open'){?>
    <?php echo smarty_function_component(array('_default_short'=>'button','attributes'=>array('data-blog-id'=>$_smarty_tpl->tpl_vars['blog']->value->getId()),'classes'=>'js-blog-join','text'=>$_smarty_tpl->tpl_vars['blog']->value->getUserIsJoin() ? $_smarty_tpl->tpl_vars['aLang']->value['blog']['join']['leave'] : $_smarty_tpl->tpl_vars['aLang']->value['blog']['join']['join'],'mods'=>$_smarty_tpl->tpl_vars['blog']->value->getUserIsJoin() ? false : 'primary'),$_smarty_tpl);?>

<?php }?><?php }} ?>