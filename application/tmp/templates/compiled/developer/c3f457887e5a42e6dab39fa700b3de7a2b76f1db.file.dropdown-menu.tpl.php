<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:09
         compiled from "/var/www/profimaster/framework/frontend/components/dropdown/dropdown-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7677475895a4e49e9e81f07-55235448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3f457887e5a42e6dab39fa700b3de7a2b76f1db' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/dropdown/dropdown-menu.tpl',
      1 => 1509206557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7677475895a4e49e9e81f07-55235448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'activeItem' => 0,
    'classes' => 0,
    'attributes' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49e9e8d166_33813493',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49e9e8d166_33813493')) {function content_5a4e49e9e8d166_33813493($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('items','name','text','activeItem','mods','classes','attributes')),$_smarty_tpl);?>


<?php echo smarty_function_component(array('_default_short'=>'nav','name'=>$_smarty_tpl->tpl_vars['name']->value ? ((string)$_smarty_tpl->tpl_vars['name']->value)."_menu" : '','activeItem'=>$_smarty_tpl->tpl_vars['activeItem']->value,'mods'=>'stacked dropdown ','showSingle'=>true,'classes'=>"ls-dropdown-menu js-ls-dropdown-menu ".((string)$_smarty_tpl->tpl_vars['classes']->value),'attributes'=>array_merge((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp),array('role'=>'menu','aria-hidden'=>'true')),'items'=>$_smarty_tpl->tpl_vars['items']->value),$_smarty_tpl);?>
<?php }} ?>