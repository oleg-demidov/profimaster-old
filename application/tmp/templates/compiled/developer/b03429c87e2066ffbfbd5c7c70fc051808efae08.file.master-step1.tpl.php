<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17764672445ab2070e037c76-72043049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b03429c87e2066ffbfbd5c7c70fc051808efae08' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step1.tpl',
      1 => 1521220871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17764672445ab2070e037c76-72043049',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aCategories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2070e03cf50_56843884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2070e03cf50_56843884')) {function content_5ab2070e03cf50_56843884($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<form method="POST">
    
<?php echo smarty_function_component(array('_default_short'=>'freelancer:category-tabs.checkboxes','categories'=>$_smarty_tpl->tpl_vars['aCategories']->value,'name'=>"specialization"),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'button','type'=>'submit','text'=>"Далее",'mods'=>"primary large"),$_smarty_tpl);?>

</form><?php }} ?>