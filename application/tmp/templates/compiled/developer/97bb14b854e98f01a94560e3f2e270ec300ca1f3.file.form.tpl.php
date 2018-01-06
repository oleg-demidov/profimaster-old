<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:34:27
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/contact/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17767386805a4e49837ae999-46187224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97bb14b854e98f01a94560e3f2e270ec300ca1f3' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/contact/form.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17767386805a4e49837ae999-46187224',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'types' => 0,
    'type' => 0,
    'field' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49837bd7e2_30486165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49837bd7e2_30486165')) {function content_5a4e49837bd7e2_30486165($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-user-contact-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('field','types')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable(array(array('value'=>'','text'=>'')), null, 0);?>

<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
    <?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>$_smarty_tpl->tpl_vars['type']->value,'value'=>$_smarty_tpl->tpl_vars['type']->value);?>
<?php } ?>

<?php echo smarty_function_component(array('_default_short'=>'admin:p-form','isEdit'=>$_smarty_tpl->tpl_vars['field']->value,'form'=>array(array('field'=>'select','name'=>'type','label'=>'Тип','items'=>$_smarty_tpl->tpl_vars['items']->value),array('field'=>'text','name'=>'title','label'=>'Название'),array('field'=>'text','name'=>'name','label'=>'Имя'),array('field'=>'text','name'=>'pattern','label'=>'Шаблон'))),$_smarty_tpl);?>
<?php }} ?>