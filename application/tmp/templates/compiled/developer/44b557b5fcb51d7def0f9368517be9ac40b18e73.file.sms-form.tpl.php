<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 13:55:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/sms-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17356695695aa8d576392095-95810541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44b557b5fcb51d7def0f9368517be9ac40b18e73' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/sms-form.tpl',
      1 => 1510826049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17356695695aa8d576392095-95810541',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'sNumber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa8d57639f260_61533801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8d57639f260_61533801')) {function content_5aa8d57639f260_61533801($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-smsform', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<form method="POST" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <p><?php echo smarty_function_lang(array('name'=>'plugin.freelancer.text.sms_form','number'=>$_smarty_tpl->tpl_vars['sNumber']->value),$_smarty_tpl);?>
</p>
    
    <?php echo smarty_function_component(array('_default_short'=>'button','type'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-send",'text'=>"Получить смс",'mods'=>"warning"),$_smarty_tpl);?>
<br><br>
    
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'field.text','name'=>"kod",'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-kod"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','buttons'=>array($_tmp1,array('text'=>'Подтвердить','mods'=>"success","classes"=>((string)$_smarty_tpl->tpl_vars['component']->value)."-submit",'type'=>'button'))),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'field.hidden','value'=>$_smarty_tpl->tpl_vars['sNumber']->value,'name'=>"number"),$_smarty_tpl);?>


</form><?php }} ?>