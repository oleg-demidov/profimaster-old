<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:40:45
         compiled from "/var/www/profimaster/application/frontend/components/property/output/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16613174205a461bad4877b9-68945530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56d3fd48d1611f2d401deea6733b361d74750b79' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/property/output/list.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16613174205a461bad4877b9-68945530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'properties' => 0,
    'property' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a461bad48d0f1_74980864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a461bad48d0f1_74980864')) {function content_5a461bad48d0f1_74980864($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php echo smarty_function_component_define_params(array('params'=>array('properties')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['properties']->value){?>
    <div class="ls-property-list">
        <?php  $_smarty_tpl->tpl_vars['property'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['property']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['properties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['property']->key => $_smarty_tpl->tpl_vars['property']->value){
$_smarty_tpl->tpl_vars['property']->_loop = true;
?>
            <?php echo smarty_function_component(array('_default_short'=>'property','template'=>'output.item','property'=>$_smarty_tpl->tpl_vars['property']->value),$_smarty_tpl);?>

        <?php } ?>
    </div>
<?php }?><?php }} ?>