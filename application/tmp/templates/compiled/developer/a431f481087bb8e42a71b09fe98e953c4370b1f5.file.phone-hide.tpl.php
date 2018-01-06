<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/phone-hide/phone-hide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10155910745a4e49ebcd9382-68113646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a431f481087bb8e42a71b09fe98e953c4370b1f5' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/phone-hide/phone-hide.tpl',
      1 => 1514975695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10155910745a4e49ebcd9382-68113646',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oField' => 0,
    'iSize' => 0,
    'oUserProfile' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebce3a35_42072895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebce3a35_42072895')) {function content_5a4e49ebce3a35_42072895($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-phone-hide', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oField','iSize')),$_smarty_tpl);?>


<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['iSize']->value)===null||$tmp==='' ? 5 : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo substr($_smarty_tpl->tpl_vars['oField']->value->getValue(),0,$_tmp1);?>
... 
<a 
    data-param-i-user-id="<?php echo $_smarty_tpl->tpl_vars['oUserProfile']->value->getId();?>
" 
    data-param-i-field-value-crop="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['iSize']->value)===null||$tmp==='' ? 5 : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php echo substr($_smarty_tpl->tpl_vars['oField']->value->getValue(),0,$_tmp2);?>
" 
    data-param-i-field-value-size="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['iSize']->value)===null||$tmp==='' ? 5 : $tmp);?>
" 
    href="/" 
    class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-linkshow"
    
>показать</a>
    <?php }} ?>