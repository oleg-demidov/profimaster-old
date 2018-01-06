<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:10
         compiled from "/var/www/profimaster/framework/frontend/components/icon/icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14331651185a4e49ea054947-54148893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18797b167de881ceb7a0260524dcfb22a857ea76' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/icon/icon.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14331651185a4e49ea054947-54148893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'icon' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ea05bc33_00637890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ea05bc33_00637890')) {function content_5a4e49ea05bc33_00637890($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fa', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('icon','mods','classes','attributes')),$_smarty_tpl);?>


<i class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 fa-<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value,'delimiter'=>'-'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
></i><?php }} ?>