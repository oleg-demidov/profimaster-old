<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:31
         compiled from "/var/www/profimaster/application/frontend/components/toolbar-scrollnav/toolbar.scrollnav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6075571145a462de70b5035-45937047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3790242bbe2d1364638e302b1b2507ceed7180d' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/toolbar-scrollnav/toolbar.scrollnav.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6075571145a462de70b5035-45937047',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de70b96e8_10345716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de70b96e8_10345716')) {function content_5a462de70b96e8_10345716($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<div class="js-toolbar-topics">
    <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'toolbar.topic_nav.prev'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'toolbar.item','icon'=>'arrow-up','classes'=>'js-toolbar-topics-prev','attributes'=>array('title'=>$_tmp1)),$_smarty_tpl);?>


    <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'toolbar.topic_nav.next'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'toolbar.item','icon'=>'arrow-down','classes'=>'js-toolbar-topics-next','attributes'=>array('title'=>$_tmp2)),$_smarty_tpl);?>

</div><?php }} ?>