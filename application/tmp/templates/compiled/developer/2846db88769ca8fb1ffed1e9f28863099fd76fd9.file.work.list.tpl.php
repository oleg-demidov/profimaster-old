<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:36:46
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4866005535ab1005e35a533-17037691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2846db88769ca8fb1ffed1e9f28863099fd76fd9' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.list.tpl',
      1 => 1502280065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4866005535ab1005e35a533-17037691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'aWorks' => 0,
    'oWork' => 0,
    'itemMods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1005e3636a3_96656808',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1005e3636a3_96656808')) {function content_5ab1005e3636a3_96656808($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-portfolio-work-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aWorks','mods','itemMods','classes')),$_smarty_tpl);?>

<div class="<?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
">
<?php  $_smarty_tpl->tpl_vars['oWork'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oWork']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aWorks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oWork']->key => $_smarty_tpl->tpl_vars['oWork']->value){
$_smarty_tpl->tpl_vars['oWork']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:portfolio.work.item','classes'=>$_smarty_tpl->tpl_vars['classes']->value,'oWork'=>$_smarty_tpl->tpl_vars['oWork']->value,'mods'=>$_smarty_tpl->tpl_vars['itemMods']->value),$_smarty_tpl);?>

<?php } ?>
</div>
<?php }} ?>