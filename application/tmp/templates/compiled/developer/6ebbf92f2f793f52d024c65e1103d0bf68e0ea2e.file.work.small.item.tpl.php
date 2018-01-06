<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.small.item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2325881245a4e3dca7ebad7-80954013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ebbf92f2f793f52d024c65e1103d0bf68e0ea2e' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/portfolio/work.small.item.tpl',
      1 => 1509706605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2325881245a4e3dca7ebad7-80954013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oWork' => 0,
    'oMedia' => 0,
    'component' => 0,
    'mods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3dca7f6490_26217012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3dca7f6490_26217012')) {function content_5a4e3dca7f6490_26217012($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-portfolio-work-small-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oWork','mods')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_variable($_smarty_tpl->tpl_vars['oWork']->value->media->getMediaOne(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['oMedia']->value){?>
<div class="<?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
  <a href="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath('800');?>
" class="js-<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-lightbox">
    
        <img src="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath('70x70crop');?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-img"><br>
    
    
  </a>
</div>
<?php }?><?php }} ?>