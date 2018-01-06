<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 14:29:46
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/market/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20386165275a4c947a757fd7-85592213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '694ebeb05507c635202398aad6ffe6e1c4c07dec' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/market/index.tpl',
      1 => 1512123151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20386165275a4c947a757fd7-85592213',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'aRoles' => 0,
    'oRole' => 0,
    'aTabs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4c947a768939_99510231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4c947a768939_99510231')) {function content_5a4c947a768939_99510231($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-market-index', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aRoles')),$_smarty_tpl);?>



<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <?php $_smarty_tpl->tpl_vars['aTabs'] = new Smarty_variable(array(), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['oRole'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oRole']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aRoles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oRole']->key => $_smarty_tpl->tpl_vars['oRole']->value){
$_smarty_tpl->tpl_vars['oRole']->_loop = true;
?>
        <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:market.role','oRole'=>$_smarty_tpl->tpl_vars['oRole']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aTabs', null, 0);
$_smarty_tpl->tpl_vars['aTabs']->value[] = array('text'=>$_smarty_tpl->tpl_vars['oRole']->value->getTitle(),'content'=>$_tmp1);?>
    <?php } ?>
    <?php echo smarty_function_component(array('_default_short'=>'tabs','classes'=>"js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-tabs",'tabs'=>$_smarty_tpl->tpl_vars['aTabs']->value),$_smarty_tpl);?>

</div>
    <?php }} ?>