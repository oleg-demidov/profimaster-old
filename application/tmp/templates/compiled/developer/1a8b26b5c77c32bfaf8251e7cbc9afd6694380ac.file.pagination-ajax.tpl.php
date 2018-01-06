<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/framework/frontend/components/pagination/pagination-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12338998705a4e49d0c9e2c2-92891280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a8b26b5c77c32bfaf8251e7cbc9afd6694380ac' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/pagination/pagination-ajax.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12338998705a4e49d0c9e2c2-92891280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0ca5b32_54477733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0ca5b32_54477733')) {function content_5a4e49d0ca5b32_54477733($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-pagination', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('mods','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." ajax", null, 0);?>

<nav class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
></nav><?php }} ?>