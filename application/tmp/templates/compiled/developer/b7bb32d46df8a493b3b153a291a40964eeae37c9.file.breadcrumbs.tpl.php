<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/breadcrumb/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9955957585aaf4e502e3d25-16340817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7bb32d46df8a493b3b153a291a40964eeae37c9' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/breadcrumb/breadcrumbs.tpl',
      1 => 1519399433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9955957585aaf4e502e3d25-16340817',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'classes' => 0,
    'items' => 0,
    'current' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e502f2894_43031222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e502f2894_43031222')) {function content_5aaf4e502f2894_43031222($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-breadcrumb', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('items','current','classes')),$_smarty_tpl);?>


<ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
"> 
    <?php if (is_array($_smarty_tpl->tpl_vars['items']->value)){?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
            <li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item ">
                <a class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item-link <?php if ($_smarty_tpl->tpl_vars['current']->value==$_smarty_tpl->tpl_vars['item']->value['name']){?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</a>
                <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['last']){?>
                    <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>"chevron-right"),$_smarty_tpl);?>

                <?php }?>
            </li>
        <?php } ?>
    <?php }?>
</ul>
    
<?php }} ?>