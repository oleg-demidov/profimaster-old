<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:36
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/block-contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17751650355ab2074c2c6820-44975980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca6312c51af0e0cb6bc5a6737217184c1daebee4' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/block-contacts.tpl',
      1 => 1515079730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17751650355ab2074c2c6820-44975980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserProfile' => 0,
    'oUser' => 0,
    'LS' => 0,
    'aContacts' => 0,
    'oField' => 0,
    'oUserCurrent' => 0,
    'aIcons' => 0,
    'sContent' => 0,
    'aList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2074c2edbf1_10048799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2074c2edbf1_10048799')) {function content_5ab2074c2edbf1_10048799($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/profimaster/framework/libs/vendor/Smarty/libs/plugins/modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-block-contacts', null, 0);?>

<?php $_smarty_tpl->tpl_vars['oUser'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['oUserProfile']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['oUser']->value : $tmp), null, 0);?>

<?php $_smarty_tpl->tpl_vars['aContacts'] = new Smarty_variable($_smarty_tpl->tpl_vars['LS']->value->User_getUserFieldsValues($_smarty_tpl->tpl_vars['oUser']->value->getId(),true,array('contact','social')), null, 0);?>

<?php $_smarty_tpl->tpl_vars['aIcons'] = new Smarty_variable(array("phone"=>"phone","vkontakte"=>"vk","E-mail"=>"envelope-o"), null, 0);?>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?> 
<?php  $_smarty_tpl->tpl_vars['oField'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oField']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aContacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oField']->key => $_smarty_tpl->tpl_vars['oField']->value){
$_smarty_tpl->tpl_vars['oField']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['oField']->value->getName()=='phone'){?>
        <?php $_smarty_tpl->tpl_vars['isAllowContact'] = new Smarty_variable(($_smarty_tpl->tpl_vars['oUserCurrent']->value&&!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isViewEmployerContacts()&&$_smarty_tpl->tpl_vars['oUser']->value->isEmployer()), null, 0);?>
        
        
        
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aIcons']->value[$_smarty_tpl->tpl_vars['oField']->value->getName()];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:phone-hide','oField'=>$_smarty_tpl->tpl_vars['oField']->value),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aList', null, 0);
$_smarty_tpl->tpl_vars['aList']->value[] = array('label'=>$_smarty_tpl->tpl_vars['oField']->value->getTitle(),'icon'=>$_tmp1,'content'=>$_tmp2);?>
        <?php continue 1?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['oField']->value->getPattern()){?>
        <?php ob_start();?><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['oField']->value->getPattern(),'{*}',$_smarty_tpl->tpl_vars['oField']->value->getValue());?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sContent'] = new Smarty_variable($_tmp3, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['sContent'] = new Smarty_variable($_smarty_tpl->tpl_vars['oField']->value->getValue(), null, 0);?>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aIcons']->value[$_smarty_tpl->tpl_vars['oField']->value->getName()];?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aList', null, 0);
$_smarty_tpl->tpl_vars['aList']->value[] = array('label'=>$_smarty_tpl->tpl_vars['oField']->value->getTitle(),'icon'=>$_tmp4,'content'=>$_smarty_tpl->tpl_vars['sContent']->value);?>
<?php } ?>


<?php echo smarty_function_component(array('_default_short'=>'info-list','mods'=>"large slender",'list'=>$_smarty_tpl->tpl_vars['aList']->value),$_smarty_tpl);?>


<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aContacts']->value);?>
<?php $_tmp5=ob_get_clean();?><?php if (!($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUser']->value->getId()==$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId())&&$_tmp5){?>
    <?php echo smarty_function_component(array('_default_short'=>'block','content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>

<?php }?>
<?php }} ?>