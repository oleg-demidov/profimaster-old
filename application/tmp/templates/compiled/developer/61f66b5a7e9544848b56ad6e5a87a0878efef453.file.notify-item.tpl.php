<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 15:53:22
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18031726515ab0da129bb976-98486519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61f66b5a7e9544848b56ad6e5a87a0878efef453' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/notify/notify-item.tpl',
      1 => 1502867238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18031726515ab0da129bb976-98486519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oNotify' => 0,
    'component' => 0,
    'mods' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0da129cd698_65037473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0da129cd698_65037473')) {function content_5ab0da129cd698_65037473($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-notify-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oNotify','mods','back','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('title', null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->tpl_vars['oNotify']->value->getTitle();?>

    <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-date"><?php echo $_smarty_tpl->tpl_vars['oNotify']->value->getDateCreate();?>
</span>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->tpl_vars['oNotify']->value->_getOriginalDataOne('text');?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('footer', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:notify.buttons','attributes'=>array('data-i-notify-id'=>$_smarty_tpl->tpl_vars['oNotify']->value->getId())),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>$_smarty_tpl->tpl_vars['mods']->value,'attributes'=>$_smarty_tpl->tpl_vars['attributes']->value,'classes'=>$_tmp1." ".((string)$_smarty_tpl->tpl_vars['component']->value),'content'=>Smarty::$_smarty_vars['capture']['content'],'footer'=>Smarty::$_smarty_vars['capture']['footer'],'title'=>Smarty::$_smarty_vars['capture']['title']),$_smarty_tpl);?>

<?php }} ?>