<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/framework/frontend/components/tags/search-form.tags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12197371495a4634f83802d7-80470005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f6b7e07bc43e9b895238e86632f53430f4049e' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/tags/search-form.tags.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12197371495a4634f83802d7-80470005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mods' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f8384c58_93510546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f8384c58_93510546')) {function content_5a4634f8384c58_93510546($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('mods','classes','attributes')),$_smarty_tpl);?>


<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'tags.search.label'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'search-form','name'=>'tags','mods'=>$_smarty_tpl->tpl_vars['mods']->value,'placeholder'=>$_tmp1,'classes'=>'js-tag-search-form','inputClasses'=>'autocomplete-tags js-tag-search','inputName'=>'tag','value'=>$_smarty_tpl->tpl_vars['tag']->value),$_smarty_tpl);?>
<?php }} ?>