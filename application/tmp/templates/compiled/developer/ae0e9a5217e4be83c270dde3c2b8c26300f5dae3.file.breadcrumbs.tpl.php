<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/search-form/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5317838755aaf4e502d4128-60976346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae0e9a5217e4be83c270dde3c2b8c26300f5dae3' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/search-form/breadcrumbs.tpl',
      1 => 1519399330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5317838755aaf4e502d4128-60976346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'aCategories' => 0,
    'oCategory' => 0,
    'aItems' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e502e1504_70557763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e502e1504_70557763')) {function content_5aaf4e502e1504_70557763($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-search-breadcrumbs', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aCategories')),$_smarty_tpl);?>


<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['search_form']['breadcrubs_first'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"masters"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(array('text'=>$_tmp1,'url'=>$_tmp2)), null, 0);?>
<?php  $_smarty_tpl->tpl_vars['oCategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oCategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oCategory']->key => $_smarty_tpl->tpl_vars['oCategory']->value){
$_smarty_tpl->tpl_vars['oCategory']->_loop = true;
?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>"masters/".((string)$_smarty_tpl->tpl_vars['oCategory']->value->getUrlFull())),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('text'=>$_smarty_tpl->tpl_vars['oCategory']->value->getTitle(),'name'=>$_smarty_tpl->tpl_vars['oCategory']->value->getUrl(),'url'=>$_tmp3);?>
<?php } ?>
<?php echo smarty_function_component(array('_default_short'=>'freelancer:breadcrumb','items'=>$_smarty_tpl->tpl_vars['aItems']->value,'classes'=>$_smarty_tpl->tpl_vars['component']->value),$_smarty_tpl);?>

    <?php }} ?>