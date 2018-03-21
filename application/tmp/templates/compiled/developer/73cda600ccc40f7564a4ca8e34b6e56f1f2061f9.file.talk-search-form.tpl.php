<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:36:34
         compiled from "/var/www/profimaster/application/frontend/components/talk/talk-search-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4168772425ab100524c0107-71628625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73cda600ccc40f7564a4ca8e34b6e56f1f2061f9' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/talk/talk-search-form.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4168772425ab100524c0107-71628625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_aRequest' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab100524e72c4_02845018',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab100524e72c4_02845018')) {function content_5ab100524e72c4_02845018($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('talk_search_form', null, null); ob_start(); ?>
    <form action="<?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
" method="GET" name="talk_filter_form" <?php if ($_smarty_tpl->tpl_vars['_aRequest']->value['submit_talk_filter']){?>style="display:block;"<?php }?>>
        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'sender','label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['sender']['label'],'note'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['sender']['note'],'inputClasses'=>'ls-width-full autocomplete-users'),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'receiver','label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['receiver']['label'],'note'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['receiver']['note'],'inputClasses'=>'ls-width-full autocomplete-users'),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'keyword','label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['keyword']['label']),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'keyword_text','label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['keyword_text']['label']),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'start','placeholder'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['start']['placeholder'],'label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['start']['label'],'inputClasses'=>'ls-width-200 js-date-picker'),$_smarty_tpl);?>


        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'end','placeholder'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['end']['placeholder'],'inputClasses'=>'ls-width-200 js-date-picker'),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'favourite','label'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['search']['fields']['favourite']['label']),$_smarty_tpl);?>


        
        <?php echo smarty_function_component(array('_default_short'=>'button','name'=>'submit_talk_filter','value'=>'1','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['search']['find']),$_smarty_tpl);?>


        <?php echo smarty_function_component(array('_default_short'=>'button','type'=>'reset','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['form_reset']),$_smarty_tpl);?>

    </form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'talk.search.title'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'details','classes'=>'js-talk-search-form','title'=>$_tmp1,'content'=>Smarty::$_smarty_vars['capture']['talk_search_form']),$_smarty_tpl);?>
<?php }} ?>