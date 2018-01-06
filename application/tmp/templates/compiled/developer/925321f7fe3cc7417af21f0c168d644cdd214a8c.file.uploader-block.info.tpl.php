<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/framework/frontend/components/uploader/uploader-block.info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7167307335a4e49d0b55b58-62020217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '925321f7fe3cc7417af21f0c168d644cdd214a8c' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/uploader/uploader-block.info.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7167307335a4e49d0b55b58-62020217',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component_info' => 0,
    'property_bind' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0b68079_76436254',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0b68079_76436254')) {function content_5a4e49d0b68079_76436254($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
?>

<?php $_smarty_tpl->tpl_vars['component_info'] = new Smarty_variable('ls-uploader-info', null, 0);?>
<?php $_smarty_tpl->tpl_vars['property_bind'] = new Smarty_variable('js-uploader-info-property', null, 0);?>

<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
    
    <div class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-block">
        
        <div class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-base">
            
            <img src="" alt="" class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-base-image <?php echo $_smarty_tpl->tpl_vars['property_bind']->value;?>
" data-name="image" width="100" height="100">

            
            <ul class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-base-properties">
                <li><strong class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-property-name ls-word-wrap <?php echo $_smarty_tpl->tpl_vars['property_bind']->value;?>
" data-name="name"></strong></li>
                <li class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-property-date <?php echo $_smarty_tpl->tpl_vars['property_bind']->value;?>
" data-name="date"></li>
                <li><span class="<?php echo $_smarty_tpl->tpl_vars['component_info']->value;?>
-property-size <?php echo $_smarty_tpl->tpl_vars['property_bind']->value;?>
" data-name="size"></span></li>
            </ul>
        </div>

        
        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'uploader.info.types.image.dimensions'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'uploader.info.types.image.title'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'uploader','template'=>'block.info-group','type'=>'1','properties'=>array(array('name'=>'dimensions','label'=>$_tmp1)),'propertiesFields'=>array(array('name'=>'title','label'=>$_tmp2))),$_smarty_tpl);?>


        
        <?php echo smarty_function_hook(array('run'=>'uploader_info_end'),$_smarty_tpl);?>

    </div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'uploader','template'=>'block','classes'=>((string)$_smarty_tpl->tpl_vars['component_info']->value)." js-uploader-info",'content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>
<?php }} ?>