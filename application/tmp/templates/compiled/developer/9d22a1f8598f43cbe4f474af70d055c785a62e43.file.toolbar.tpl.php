<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:48
         compiled from "/var/www/profimaster/framework/frontend/components/button/toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4833207935a4a11d43c3097-47458782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d22a1f8598f43cbe4f474af70d055c785a62e43' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/button/toolbar.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4833207935a4a11d43c3097-47458782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hook' => 0,
    'params' => 0,
    'groups' => 0,
    'hookGroups' => 0,
    'mods' => 0,
    'component' => 0,
    'classes' => 0,
    'attributes' => 0,
    'group' => 0,
    'groupMod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11d43dc346_77179562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11d43dc346_77179562')) {function content_5a4a11d43dc346_77179562($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-button-toolbar', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('groups','hook','mods','classes','attributes')),$_smarty_tpl);?>



<?php if ($_smarty_tpl->tpl_vars['hook']->value){?>
    <?php echo smarty_function_hook(array('run'=>$_smarty_tpl->tpl_vars['hook']->value,'assign'=>'hookGroups','params'=>$_smarty_tpl->tpl_vars['params']->value,'items'=>$_smarty_tpl->tpl_vars['groups']->value,'array'=>true),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['groups'] = new Smarty_variable($_smarty_tpl->tpl_vars['hookGroups']->value ? $_smarty_tpl->tpl_vars['hookGroups']->value : $_smarty_tpl->tpl_vars['groups']->value, null, 0);?>
<?php }?>




<?php if (in_array('vertical',explode(' ',$_smarty_tpl->tpl_vars['mods']->value))){?>
    <?php $_smarty_tpl->tpl_vars['groupMod'] = new Smarty_variable('vertical', null, 0);?>
<?php }?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
 ls-clearfix" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
 role="toolbar">
    <?php if (is_array($_smarty_tpl->tpl_vars['groups']->value)){?>
        <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['group']->value)){?>
                
                    <?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','role'=>'group','mods'=>$_smarty_tpl->tpl_vars['groupMod']->value,'params'=>$_smarty_tpl->tpl_vars['group']->value),$_smarty_tpl);?>

                
            <?php }else{ ?>
                <?php echo $_smarty_tpl->tpl_vars['group']->value;?>

            <?php }?>
        <?php } ?>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->tpl_vars['groups']->value;?>

    <?php }?>
</div><?php }} ?>