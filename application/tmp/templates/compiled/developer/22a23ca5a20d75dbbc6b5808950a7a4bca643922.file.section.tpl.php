<?php /* Smarty version Smarty-3.1.13, created on 2017-12-26 12:59:03
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-optimization/section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1092166615a41f337133e16-41540187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a23ca5a20d75dbbc6b5808950a7a4bca643922' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-optimization/section.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1092166615a41f337133e16-41540187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'title' => 0,
    'desc' => 0,
    'actions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a41f33713f007_30973696',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a41f33713f007_30973696')) {function content_5a41f33713f007_30973696($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-optimization-section', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('title','desc','actions')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    <h2 class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-desc">
        <?php echo $_smarty_tpl->tpl_vars['desc']->value;?>

    </div>

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-body">
        <?php echo smarty_function_component(array('_default_short'=>'admin:nav','showSingle'=>true,'mods'=>'stacked','items'=>$_smarty_tpl->tpl_vars['actions']->value),$_smarty_tpl);?>

    </div>
</div><?php }} ?>