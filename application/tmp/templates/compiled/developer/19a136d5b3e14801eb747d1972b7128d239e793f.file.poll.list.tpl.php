<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:40:45
         compiled from "/var/www/profimaster/application/frontend/components/poll/poll.list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7890162395a461bad498107-40652788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19a136d5b3e14801eb747d1972b7128d239e793f' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/poll/poll.list.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7890162395a461bad498107-40652788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'polls' => 0,
    'poll' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a461bad4a1c53_29677263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a461bad4a1c53_29677263')) {function content_5a461bad4a1c53_29677263($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php  $_smarty_tpl->tpl_vars['poll'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['poll']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['polls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['poll']->key => $_smarty_tpl->tpl_vars['poll']->value){
$_smarty_tpl->tpl_vars['poll']->_loop = true;
?>
    <?php echo smarty_function_component(array('_default_short'=>'poll','poll'=>$_smarty_tpl->tpl_vars['poll']->value),$_smarty_tpl);?>

<?php } ?><?php }} ?>