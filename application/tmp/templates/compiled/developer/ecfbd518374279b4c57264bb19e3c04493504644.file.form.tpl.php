<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/search/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10786095475a4e3dca2bf062-77311926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecfbd518374279b4c57264bb19e3c04493504644' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/search/form.tpl',
      1 => 1513584273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10786095475a4e3dca2bf062-77311926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'action' => 0,
    'specializationSelected' => 0,
    'specializations' => 0,
    'oUserCurrent' => 0,
    'contentReturn' => 0,
    'orderItems' => 0,
    'iCount' => 0,
    'sMenuHeadItemSelect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3dca2e06b3_67952112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3dca2e06b3_67952112')) {function content_5a4e3dca2e06b3_67952112($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-search-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('sEntity','mods','orderItems','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("search_form", null, null); ob_start(); ?>
    <form  method="GET" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" > 
        <div class='ls-grid-row'>
            <div class='ls-grid-col ls-grid-col-4'>
                <?php echo smarty_function_component(array('_default_short'=>'freelancer:specialization.tree','specializationSelected'=>$_smarty_tpl->tpl_vars['specializationSelected']->value,'aSpecializations'=>$_smarty_tpl->tpl_vars['specializations']->value,'label'=>"Специализация"),$_smarty_tpl);?>

            </div>
            <div class='ls-grid-col ls-grid-col-3'>
                <?php echo smarty_function_hook(array('run'=>"freelancer_search_form",'assign'=>'contentReturn','target'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value),$_smarty_tpl);?>

                <?php echo $_smarty_tpl->tpl_vars['contentReturn']->value;?>

            </div>
            <div class='ls-grid-col ls-grid-col-5'>
                <?php echo smarty_function_component(array('_default_short'=>'freelancer:search.sort','label'=>"Сортировать",'orderItems'=>$_smarty_tpl->tpl_vars['orderItems']->value),$_smarty_tpl);?>

            </div>
        </div>
    
    
 </form>      
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    
<?php $_smarty_tpl->_capture_stack[0][] = array("search_form_footer", null, null); ob_start(); ?>
    <div class='<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-count-result'>результатов: <b><?php echo $_smarty_tpl->tpl_vars['iCount']->value;?>
</b></div>  
     <?php echo smarty_function_component(array('_default_short'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-but-submit",'text'=>"Найти",'mods'=>"primary"),$_smarty_tpl);?>

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
    <?php if ($_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value=='order_search'){?>
        <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isEmployer()){?>
                <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order/add'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>"success",'url'=>$_tmp1,'text'=>"Создать заказ",'classes'=>"but_add_order"),$_smarty_tpl);?>

            <?php }?>
        <?php }else{ ?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'user/register_employer/step1'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>"success",'url'=>$_tmp2,'text'=>"Создать заказ",'classes'=>"but_add_order"),$_smarty_tpl);?>

        <?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value),'title'=>Smarty::$_smarty_vars['capture']['search_form_title'],'content'=>Smarty::$_smarty_vars['capture']['search_form'],'footer'=>Smarty::$_smarty_vars['capture']['search_form_footer']),$_smarty_tpl);?>
<?php }} ?>