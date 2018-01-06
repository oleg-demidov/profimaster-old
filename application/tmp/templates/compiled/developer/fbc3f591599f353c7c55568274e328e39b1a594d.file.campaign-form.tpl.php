<?php /* Smarty version Smarty-3.1.13, created on 2017-12-26 16:08:55
         compiled from "/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/components/campaign/campaign-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5778063055a421fb7d19946-54838259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbc3f591599f353c7c55568274e328e39b1a594d' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ydirect/frontend/skin/default/components/campaign/campaign-form.tpl',
      1 => 1514278358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5778063055a421fb7d19946-54838259',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oCampaign' => 0,
    'aKeywords' => 0,
    'sKeywords' => 0,
    'oKeyword' => 0,
    'isActive' => 0,
    'sNKeywords' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a421fb7d31a35_45372453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a421fb7d31a35_45372453')) {function content_5a421fb7d31a35_45372453($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ydirect-campagn-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oCampaign')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('campaign_form', null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['oCampaign']->value){?>
        <?php $_smarty_tpl->tpl_vars['sKeywords'] = new Smarty_variable($_smarty_tpl->tpl_vars['oCampaign']->value->getNegativeKeywords(), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['isActive'] = new Smarty_variable($_smarty_tpl->tpl_vars['oCampaign']->value->getActive(), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['aKeywords'] = new Smarty_variable($_smarty_tpl->tpl_vars['oCampaign']->value->getKeywords(), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['sNKeywords'] = new Smarty_variable($_smarty_tpl->tpl_vars['oCampaign']->value->getNegativeKeywords(), null, 0);?>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['sKeywords'] = new Smarty_variable('', null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['oKeyword'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oKeyword']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aKeywords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oKeyword']->key => $_smarty_tpl->tpl_vars['oKeyword']->value){
$_smarty_tpl->tpl_vars['oKeyword']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['sKeywords'] = new Smarty_variable(($_smarty_tpl->tpl_vars['sKeywords']->value).($_smarty_tpl->tpl_vars['oKeyword']->value->getValue()), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['sKeywords'] = new Smarty_variable(($_smarty_tpl->tpl_vars['sKeywords']->value).(', '), null, 0);?>
    <?php } ?>
    
    <?php echo smarty_function_component(array('_default_short'=>'field.checkbox','classes'=>"js-checkbox-on-campaign",'name'=>"campaign_active",'checked'=>$_smarty_tpl->tpl_vars['isActive']->value,'label'=>"Активировать кампанию"),$_smarty_tpl);?>

    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sKeywords']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>"field.text",'value'=>$_tmp1,'name'=>"campaign_keywords",'label'=>"Ключевые слова"),$_smarty_tpl);?>
   
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sNKeywords']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'campaign_negative_keywords','label'=>'Минус Ключевые слова(Через запятую)','value'=>$_tmp2),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<script>
    /*document.addEventListener("DOMContentLoaded", function(){ 
        //console.log($('js-checkbox-on-campaign'))
               
    });*/
</script>
<?php echo smarty_function_component(array('_default_short'=>'block','title'=>"Настройки Ydirect",'content'=>Smarty::$_smarty_vars['capture']['campaign_form']),$_smarty_tpl);?>

<?php }} ?>