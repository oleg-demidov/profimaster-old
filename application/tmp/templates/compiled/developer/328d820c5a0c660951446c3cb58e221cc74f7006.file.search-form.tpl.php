<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:47
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/search-form/search-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18018842565aaf4e4fdbe928-92560465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '328d820c5a0c660951446c3cb58e221cc74f7006' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/search-form/search-form.tpl',
      1 => 1521039929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18018842565aaf4e4fdbe928-92560465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'geoLabel' => 0,
    'oGeoTarget' => 0,
    'oGeo' => 0,
    'specializationSelected' => 0,
    'aSpecializations' => 0,
    'iMastersCount' => 0,
    'sMenuHeadItemSelect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e4fddac31_90923285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e4fddac31_90923285')) {function content_5aaf4e4fddac31_90923285($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-search-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('sEntity','geoLabel','aSpecializations')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("search_form", null, null); ob_start(); ?>
    <form  method="GET" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" action="<?php echo smarty_function_router(array('page'=>"masters"),$_smarty_tpl);?>
" > 
        <?php echo smarty_function_component(array('_default_short'=>"field.hidden",'name'=>"form",'value'=>"1"),$_smarty_tpl);?>

        
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:field.query','classes'=>"js-query-input",'name'=>"query",'label'=>"Поиск совпадения"),$_smarty_tpl);?>

            
        <?php echo smarty_function_component(array('_default_short'=>'ymaps:fields.ajaxgeo','classes'=>"js-search-form-geo",'label'=>$_smarty_tpl->tpl_vars['geoLabel']->value,'place'=>$_smarty_tpl->tpl_vars['oGeoTarget']->value,'choosenGeo'=>$_smarty_tpl->tpl_vars['oGeo']->value),$_smarty_tpl);?>
 
            
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"masters"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:field.category-tree','url'=>$_tmp1,'categoriesSelected'=>$_smarty_tpl->tpl_vars['specializationSelected']->value,'aCategories'=>$_smarty_tpl->tpl_vars['aSpecializations']->value,'label'=>"Специализация"),$_smarty_tpl);?>
 
        
    </form>      
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    
<?php $_smarty_tpl->_capture_stack[0][] = array("search_form_footer", null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-but-submit",'text'=>"Найти",'mods'=>"primary"),$_smarty_tpl);?>

    <span class="search-results-count"><?php echo smarty_function_lang(array('name'=>"plugin.freelancer.search_form.count"),$_smarty_tpl);?>
: <b><?php echo $_smarty_tpl->tpl_vars['iMastersCount']->value;?>
</b></span>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    
<?php $_smarty_tpl->_capture_stack[0][] = array("search_form_title", null, null); ob_start(); ?>
    <?php if (!$_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value){?><?php $_smarty_tpl->tpl_vars['sMenuHeadItemSelect'] = new Smarty_variable('master_search', null, 0);?><?php }?>
    <span style='font-size:20px;'><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'search'),$_smarty_tpl);?>
 <?php echo smarty_function_lang(array('name'=>"plugin.freelancer.text.".((string)$_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value)),$_smarty_tpl);?>
</span>
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'title'=>Smarty::$_smarty_vars['capture']['search_form_title'],'content'=>Smarty::$_smarty_vars['capture']['search_form'],'footer'=>Smarty::$_smarty_vars['capture']['search_form_footer']),$_smarty_tpl);?>
<?php }} ?>