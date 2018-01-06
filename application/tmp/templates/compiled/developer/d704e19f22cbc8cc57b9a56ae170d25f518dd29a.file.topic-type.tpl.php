<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/topic/topic-type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14849235935a462de6bdf329-92865548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd704e19f22cbc8cc57b9a56ae170d25f518dd29a' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/topic/topic-type.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14849235935a462de6bdf329-92865548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'topic' => 0,
    'type' => 0,
    'LS' => 0,
    'template' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de6bebe98_03303716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de6bebe98_03303716')) {function content_5a462de6bebe98_03303716($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('topic','isPreview','isList','mods','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable($_smarty_tpl->tpl_vars['topic']->value->getType(), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['LS']->value->Topic_IsAllowTopicType($_smarty_tpl->tpl_vars['type']->value)){?>
    <?php $_smarty_tpl->tpl_vars['template'] = new Smarty_variable($_smarty_tpl->tpl_vars['LS']->value->Component_GetTemplatePath('topic',"topic-type-".((string)$_smarty_tpl->tpl_vars['type']->value)), null, 0);?>

    <?php if ($_smarty_tpl->tpl_vars['template']->value){?>
        <?php echo smarty_function_component(array('_default_short'=>"topic.topic-type-".((string)$_smarty_tpl->tpl_vars['type']->value),'params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'topic','params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>

    <?php }?>
<?php }?><?php }} ?>