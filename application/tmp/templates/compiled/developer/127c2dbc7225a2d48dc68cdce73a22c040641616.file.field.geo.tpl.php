<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/components/field/field.geo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11187754605a4e49d0987920-23695602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '127c2dbc7225a2d48dc68cdce73a22c040641616' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/components/field/field.geo.tpl',
      1 => 1501238154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11187754605a4e49d0987920-23695602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oTarget' => 0,
    'user' => 0,
    'oOrder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d098ffe5_57751858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d098ffe5_57751858')) {function content_5a4e49d098ffe5_57751858($_smarty_tpl) {?><?php if (!is_callable('smarty_insert_block')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/insert.block.php';
?><?php if (!$_smarty_tpl->tpl_vars['oTarget']->value){?>
    <?php if ($_smarty_tpl->tpl_vars['user']->value){?>
        <?php $_smarty_tpl->tpl_vars['oTarget'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['oOrder']->value){?>
        <?php $_smarty_tpl->tpl_vars['oTarget'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value, null, 0);?>
    <?php }?>
<?php }?>
<?php echo smarty_insert_block(array('block' => "Geo", 'params' => array('plugin'=>'ydirect','target'=>$_smarty_tpl->tpl_vars['oTarget']->value,'entity'=>'ModuleUser_EntityUser')),$_smarty_tpl);?>
<?php }} ?>