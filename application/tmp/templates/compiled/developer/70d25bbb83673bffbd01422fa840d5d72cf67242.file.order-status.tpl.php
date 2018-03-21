<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 14:33:00
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20914577375aa8de3c961851-83605112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70d25bbb83673bffbd01422fa840d5d72cf67242' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-status.tpl',
      1 => 1510485056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20914577375aa8de3c961851-83605112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oOrder' => 0,
    'aStatusIcons' => 0,
    'aParamsIcon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa8de3c972b06_16598256',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8de3c972b06_16598256')) {function content_5aa8de3c972b06_16598256($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-order-status', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oOrder')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['aStatusIcons'] = new Smarty_variable(array('new'=>array('icon'=>'plus','title'=>'Новый'),'publish'=>array('icon'=>'eye','title'=>"Опубликовано: ".((string)$_smarty_tpl->tpl_vars['oOrder']->value->getDateCreate())),'moderate'=>array('icon'=>'eye-slash','title'=>'На модерации'),'master_wait'=>array('icon'=>'exclamation','title'=>'Ожидание запуска'),'start'=>array('icon'=>'play','title'=>'Запущен'),'end'=>array('icon'=>'check','title'=>'Завершен')), null, 0);?>
    
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aStatusIcons']->value[$_smarty_tpl->tpl_vars['oOrder']->value->getStatus()]['title'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aParamsIcon'] = new Smarty_variable(array('icon'=>$_smarty_tpl->tpl_vars['aStatusIcons']->value[$_smarty_tpl->tpl_vars['oOrder']->value->getStatus()]['icon'],'classes'=>'js-order-status','attributes'=>array('title'=>$_tmp1)), null, 0);?>
    
<?php echo smarty_function_component(array('_default_short'=>'icon','params'=>$_smarty_tpl->tpl_vars['aParamsIcon']->value),$_smarty_tpl);?>
<?php }} ?>