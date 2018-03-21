<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15832643825aaf4e5035a316-19670046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '198f22d9cea8dca392f2a08035ec3e68b6ef92c2' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/master/master-page.tpl',
      1 => 1519719792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15832643825aaf4e5035a316-19670046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'classes' => 0,
    'sBaseUrl' => 0,
    'aPaging' => 0,
    'aMasters' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e5036b464_01727186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e5036b464_01727186')) {function content_5aaf4e5036b464_01727186($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-master-page', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aMasters','aPaging','classes','sBaseUrl')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" data-s-base-url="<?php echo $_smarty_tpl->tpl_vars['sBaseUrl']->value;?>
" data-i-current-page="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['aPaging']->value['iCurrentPage'])===null||$tmp==='' ? 1 : $tmp);?>
">
    <?php $_smarty_tpl->_capture_stack[0][] = array('pagination', null, null); ob_start(); ?>
            <?php echo smarty_function_component(array('_default_short'=>'pagination','total'=>+$_smarty_tpl->tpl_vars['aPaging']->value['iCountPage'],'current'=>+$_smarty_tpl->tpl_vars['aPaging']->value['iCurrentPage'],'url'=>((string)$_smarty_tpl->tpl_vars['aPaging']->value['sBaseUrl'])."/page__page__/".((string)$_smarty_tpl->tpl_vars['aPaging']->value['sGetParams']),'classes'=>'js-pagination-users'),$_smarty_tpl);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

    <?php echo Smarty::$_smarty_vars['capture']['pagination'];?>


    <?php echo smarty_function_component(array('_default_short'=>"freelancer:master.list",'aMasters'=>$_smarty_tpl->tpl_vars['aMasters']->value),$_smarty_tpl);?>

    <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aMasters']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
        <?php echo smarty_function_component(array('_default_short'=>'blankslate','title'=>"Результатов нет"),$_smarty_tpl);?>

    <?php }?>    

    <?php echo Smarty::$_smarty_vars['capture']['pagination'];?>


</div><?php }} ?>