<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/ymaps/frontend/skin/default/components/search-map/toggle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2000224745aaf4e50349410-70810015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c95c6db01c6c33459dc348aed7c420f749a08a' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ymaps/frontend/skin/default/components/search-map/toggle.tpl',
      1 => 1519725433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2000224745aaf4e50349410-70810015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e503560c7_54138215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e503560c7_54138215')) {function content_5aaf4e503560c7_54138215($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['ymaps']['toggle']['list'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['ymaps']['toggle']['list_title'];?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['ymaps']['toggle']['map'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['ymaps']['toggle']['map_title'];?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','classes'=>"js-ymap-enable-map ls-sort",'buttons'=>array(array('text'=>"Вид",'type'=>'button','isDisabled'=>true),array('icon'=>'list','text'=>$_tmp1,'classes'=>'js-show-list','type'=>'button','isDisabled'=>true,'attributes'=>array('title'=>$_tmp2)),array('icon'=>'map-o','text'=>$_tmp3,'classes'=>'js-show-map','type'=>'button','attributes'=>array('title'=>$_tmp4)))),$_smarty_tpl);?>
<?php }} ?>