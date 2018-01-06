<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.small.list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12369303275a4e3dca7e0b89-83640162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0b0a449a33ce43ece9a218655a289fe050f3c27' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.small.list.tpl',
      1 => 1502617010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12369303275a4e3dca7e0b89-83640162',
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
  'unifunc' => 'content_5a4e3dca7e9b38_69108862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3dca7e9b38_69108862')) {function content_5a4e3dca7e9b38_69108862($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-portfolio-work-small-list', null, 0);?>
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
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:portfolio.work.small.item','classes'=>$_smarty_tpl->tpl_vars['classes']->value,'oWork'=>$_smarty_tpl->tpl_vars['oWork']->value,'mods'=>$_smarty_tpl->tpl_vars['itemMods']->value),$_smarty_tpl);?>

<?php } ?>
</div>
<?php }} ?>