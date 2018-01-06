<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:12
         compiled from "/var/www/profimaster/application/frontend/components/toolbar-scrollup/toolbar.scrollup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10607598225a4e49ec083a04-13348293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67ad830faf1ce166486ef2210533e295a5c8c250' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/toolbar-scrollup/toolbar.scrollup.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10607598225a4e49ec083a04-13348293',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ec086340_99195305',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ec086340_99195305')) {function content_5a4e49ec086340_99195305($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'toolbar.scrollup.title'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'toolbar.item','icon'=>'chevron-up','classes'=>'js-toolbar-scrollup','mods'=>'scrollup','attributes'=>array('title'=>$_tmp1)),$_smarty_tpl);?>
<?php }} ?>