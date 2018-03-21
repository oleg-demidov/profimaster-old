<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:57:14
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/pagination/elements-on-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:443034435ab1052a617772-50600295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '676708ba20da4b03ca6ec1434c38a0983eee7dd8' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/pagination/elements-on-page.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '443034435ab1052a617772-50600295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formId' => 0,
    'url' => 0,
    'component' => 0,
    'aLang' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1052a6257f8_50272320',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1052a6257f8_50272320')) {function content_5ab1052a6257f8_50272320($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('pagination-eop', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('url','value','formId')),$_smarty_tpl);?>



<?php $_smarty_tpl->tpl_vars['formId'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['formId']->value)===null||$tmp==='' ? 'admin_onpage' : $tmp), null, 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" method="post" id="<?php echo $_smarty_tpl->tpl_vars['formId']->value;?>
">
	<?php echo smarty_function_component(array('_default_short'=>'admin:field.hidden.security-key'),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['on_page'];?>


	<select name="onpage" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-select">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = Config::Get('plugin.admin.pagination.values_for_select_elements_on_page'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value==$_smarty_tpl->tpl_vars['value']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
		<?php } ?>
	</select>
</form>
<?php }} ?>