<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:40:45
         compiled from "/var/www/profimaster/framework/frontend/components/tags/tags-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34685655a461bad4d74d0-35776786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '442746b9df35e0d3db899db3fb7c4dbe1e6c96b6' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/tags/tags-item.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34685655a461bad4d74d0-35776786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'url' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a461bad4e4265_10020042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a461bad4e4265_10020042')) {function content_5a461bad4e4265_10020042($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-tags-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('text','url','isFirst','isLast','mods','classes','attributes')),$_smarty_tpl);?>





<li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
">
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" rel="tag">
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8', true);?>

    </a>
</li><?php }} ?>