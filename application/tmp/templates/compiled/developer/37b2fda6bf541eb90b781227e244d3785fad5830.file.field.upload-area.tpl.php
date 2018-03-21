<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:56
         compiled from "/var/www/profimaster/framework/frontend/components/field/field.upload-area.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12400326955ab207240a8f59-99852692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37b2fda6bf541eb90b781227e244d3785fad5830' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/field/field.upload-area.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12400326955ab207240a8f59-99852692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'label' => 0,
    'inputName' => 0,
    'inputClasses' => 0,
    'inputAttributes' => 0,
    'isMultiple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab207240b5ab4_20382605',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab207240b5ab4_20382605')) {function content_5ab207240b5ab4_20382605($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-field-upload-area', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('isMultiple','inputAttributes','inputClasses','inputName','label','mods','classes','attributes')),$_smarty_tpl);?>


<label class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    <span><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'field.upload_area.label'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['label']->value)===null||$tmp==='' ? $_tmp1 : $tmp);?>
</span>
    <input type="file" name="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['inputName']->value)===null||$tmp==='' ? 'file' : $tmp);?>
" class="<?php echo $_smarty_tpl->tpl_vars['inputClasses']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['inputAttributes']->value),$_smarty_tpl);?>
 <?php echo (($tmp = @$_smarty_tpl->tpl_vars['isMultiple']->value)===null||$tmp==='' ? 'multiple' : $tmp);?>
>
</label><?php }} ?>