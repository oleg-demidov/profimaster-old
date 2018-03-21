<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:47
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/activation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2492864755ab1050fae6126-45780686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f5ceca3f93ae89dfe38378544bd51239265e9d' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/activation.tpl',
      1 => 1510826049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2492864755ab1050fae6126-45780686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sEmail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1050faeb421_95308409',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1050faeb421_95308409')) {function content_5ab1050faeb421_95308409($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master-activation', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<p class="activation_text"><?php echo smarty_function_lang(array('name'=>'plugin.freelancer.text.activation','email'=>$_smarty_tpl->tpl_vars['sEmail']->value),$_smarty_tpl);?>
</p>

<?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'auth','template'=>'reactivation'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'details','classes'=>'js-activation-details','title'=>'Я не получил письмо','content'=>"<p>Попробуйте отправить повторно</p>".$_tmp1),$_smarty_tpl);?>

<?php }} ?>