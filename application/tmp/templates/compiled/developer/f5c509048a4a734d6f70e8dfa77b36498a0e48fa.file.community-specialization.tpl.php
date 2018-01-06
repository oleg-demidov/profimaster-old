<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/community/blocks/community-specialization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15641318905a4634f80e19e2-37474833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c509048a4a734d6f70e8dfa77b36498a0e48fa' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/community/blocks/community-specialization.tpl',
      1 => 1514337574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15641318905a4634f80e19e2-37474833',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aBranchs' => 0,
    'oBranch' => 0,
    'component' => 0,
    'aItems' => 0,
    'selectedBranch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f80edc90_73933972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f80edc90_73933972')) {function content_5a4634f80edc90_73933972($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-comm-specialization', null, 0);?>

<?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(), null, 0);?>
<?php  $_smarty_tpl->tpl_vars['oBranch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oBranch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBranchs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oBranch']->key => $_smarty_tpl->tpl_vars['oBranch']->value){
$_smarty_tpl->tpl_vars['oBranch']->_loop = true;
?>
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oBranch']->value->getTitle();?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oBranch']->value->getId();?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('text'=>$_tmp1,'value'=>$_tmp2,'icon'=>$_smarty_tpl->tpl_vars['oBranch']->value->_getIcon());?>
<?php } ?>

<?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:dropdown-select','mods'=>'large','classes'=>"js-community-specialization",'aItems'=>$_smarty_tpl->tpl_vars['aItems']->value,'selectedItem'=>$_smarty_tpl->tpl_vars['selectedBranch']->value),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','title'=>"Ветка",'classes'=>$_smarty_tpl->tpl_vars['component']->value,'content'=>$_tmp3),$_smarty_tpl);?>

<?php }} ?>