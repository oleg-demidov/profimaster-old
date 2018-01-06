<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/application/frontend/components/media/panes/pane.photoset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4547524635a4e49d0ca8641-04068110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca66cb96dffa8e6bf07938cfc2a3115b8cd2a1e4' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/panes/pane.photoset.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
    'f1ba260635030e314458fa198922b4d56b493b82' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/panes/pane.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4547524635a4e49d0ca8641-04068110',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0cb0023_44050913',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0cb0023_44050913')) {function content_5a4e49d0cb0023_44050913($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
    <?php echo smarty_function_component_define_params(array('params'=>array('id')),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('tab-media-photoset', null, 0);?>


<div class="ls-media-pane-content js-media-pane-content">
    
</div>

<div class="ls-media-pane-footer">
    
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'media.photoset.submit'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','classes'=>'js-media-photoset-submit','text'=>$_tmp1),$_smarty_tpl);?>


</div><?php }} ?>