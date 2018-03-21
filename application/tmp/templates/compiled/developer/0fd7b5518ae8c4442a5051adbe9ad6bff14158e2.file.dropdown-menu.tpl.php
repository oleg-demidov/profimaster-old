<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:55
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/dropdown/dropdown-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6836211955ab20723def885-53789931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fd7b5518ae8c4442a5051adbe9ad6bff14158e2' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/dropdown/dropdown-menu.tpl',
      1 => 1509261881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6836211955ab20723def885-53789931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isSubnav' => 0,
    'name' => 0,
    'activeItem' => 0,
    'classes' => 0,
    'attributes' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab20723dfa143_93113353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab20723dfa143_93113353')) {function content_5ab20723dfa143_93113353($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('items','name','text','activeItem','mods','classes','attributes','isSubnav')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'nav','isSubnav'=>$_smarty_tpl->tpl_vars['isSubnav']->value,'name'=>$_smarty_tpl->tpl_vars['name']->value ? ((string)$_smarty_tpl->tpl_vars['name']->value)."_menu" : '','activeItem'=>$_smarty_tpl->tpl_vars['activeItem']->value,'mods'=>"stacked dropdown",'showSingle'=>true,'classes'=>"ls-dropdown-menu js-ls-dropdown-menu ".((string)$_smarty_tpl->tpl_vars['classes']->value),'attributes'=>array_merge((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp),array('role'=>'menu','aria-hidden'=>'true')),'items'=>$_smarty_tpl->tpl_vars['items']->value),$_smarty_tpl);?>
<?php }} ?>