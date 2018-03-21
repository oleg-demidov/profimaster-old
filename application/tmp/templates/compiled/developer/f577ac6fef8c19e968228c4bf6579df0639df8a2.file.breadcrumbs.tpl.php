<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:55
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/breadcrumbs/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14996371025ab20723d0c015-19794845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f577ac6fef8c19e968228c4bf6579df0639df8a2' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/breadcrumbs/breadcrumbs.tpl',
      1 => 1505471487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14996371025ab20723d0c015-19794845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'list' => 0,
    'item' => 0,
    'current' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab20723d156c4_37574189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab20723d156c4_37574189')) {function content_5ab20723d156c4_37574189($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-breadcrumbs', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('list','current')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
<?php if (is_array($_smarty_tpl->tpl_vars['list']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="breadcrumb-item <?php if ($_smarty_tpl->tpl_vars['item']->value['number']==$_smarty_tpl->tpl_vars['current']->value){?>current<?php }?>">
            <span class="number"><?php echo $_smarty_tpl->tpl_vars['item']->value['number'];?>
</span>
            <span class="label"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>
        </div>
    <?php } ?>
<?php }?>
</div>
    
<?php }} ?>