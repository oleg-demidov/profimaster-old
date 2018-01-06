<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:45:05
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4499588175a4e3df1ab1bc8-42142543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '890c70e04a110319889c98487fb3d21b7ad2ad37' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/form.tpl',
      1 => 1509414719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4499588175a4e3df1ab1bc8-42142543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'component' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3df1abdee7_76348758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3df1abdee7_76348758')) {function content_5a4e3df1abdee7_76348758($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
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


<?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'title'=>$_smarty_tpl->tpl_vars['title']->value,'content'=>Smarty::$_smarty_vars['capture']['search_form']),$_smarty_tpl);?>
<?php }} ?>