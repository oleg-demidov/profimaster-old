<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:12
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/media/media.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1848315945a46320cca8cb4-68596969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de1a4b921763f7cd8db7df2a62cec02f116eeae3' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/media/media.tpl',
      1 => 1501238150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1848315945a46320cca8cb4-68596969',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46320ccad2c4_34730213',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46320ccad2c4_34730213')) {function content_5a46320ccad2c4_34730213($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'media','sMediaTargetType'=>'user','sMediaTargetId'=>$_smarty_tpl->tpl_vars['oUser']->value->getId(),'classes'=>"user-media-mymodal",'id'=>"media_modal_user"),$_smarty_tpl);?>

 <?php }} ?>