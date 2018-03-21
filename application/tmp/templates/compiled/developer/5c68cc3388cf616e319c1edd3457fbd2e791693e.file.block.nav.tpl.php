<?php /* Smarty version Smarty-3.1.13, created on 2018-03-18 15:57:58
         compiled from "/var/www/profimaster/application/plugins/docs/frontend/skin/default/blocks/block.nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11749057505aae3826b54fb5-11311973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c68cc3388cf616e319c1edd3457fbd2e791693e' => 
    array (
      0 => '/var/www/profimaster/application/plugins/docs/frontend/skin/default/blocks/block.nav.tpl',
      1 => 1493631968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11749057505aae3826b54fb5-11311973',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'docsComponents' => 0,
    'docsCurrentComponent' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aae3826b5aed2_93380682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aae3826b5aed2_93380682')) {function content_5aae3826b5aed2_93380682($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>

<ul class="p-docs-nav">
    <?php  $_smarty_tpl->tpl_vars['component'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['component']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['docsComponents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['component']->key => $_smarty_tpl->tpl_vars['component']->value){
$_smarty_tpl->tpl_vars['component']->_loop = true;
?>
        <li class="p-docs-nav-item <?php if ($_smarty_tpl->tpl_vars['docsCurrentComponent']->value==$_smarty_tpl->tpl_vars['component']->value){?>active<?php }?>">
            <a href="<?php echo smarty_function_router(array('page'=>'docs'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" class="p-docs-nav-item-link">
                <?php echo $_smarty_tpl->tpl_vars['component']->value;?>

            </a>
        </li>
    <?php } ?>
</ul><?php }} ?>