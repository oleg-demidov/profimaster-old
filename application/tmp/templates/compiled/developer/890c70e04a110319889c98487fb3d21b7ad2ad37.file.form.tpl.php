<?php /* Smarty version Smarty-3.1.13, created on 2018-03-16 21:30:46
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17897983255aabe32642a6b3-11583132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '890c70e04a110319889c98487fb3d21b7ad2ad37' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/form.tpl',
      1 => 1516275433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17897983255aabe32642a6b3-11583132',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aabe326435de4_06499179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabe326435de4_06499179')) {function content_5aabe326435de4_06499179($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_insert_block')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/insert.block.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-index-search-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('action','title')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("search_form", null, null); ob_start(); ?>
    <form  method="GET" action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" > 
    
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'plugin.freelancer.text.specialization'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_insert_block(array('block' => "specialization", 'params' => array('plugin'=>'freelancer','label_name'=>$_tmp1,'entity'=>"User",'form_field'=>'specialization')),$_smarty_tpl);?>

        <div id="action_search">
    
    <?php echo smarty_function_component(array('_default_short'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-but-submit",'text'=>"Далее",'mods'=>"primary large"),$_smarty_tpl);?>

 </form>      
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo Smarty::$_smarty_vars['capture']['search_form'];?>


<?php }} ?>