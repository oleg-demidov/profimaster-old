<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 20:07:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/blocks/block.activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16577530055aa92cb2a1abf3-62808108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8508ffa335901196011940c1a74b6c6880f32bf' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/blocks/block.activity.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16577530055aa92cb2a1abf3-62808108',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'stats' => 0,
    'rating' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92cb2a338a7_64701775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92cb2a338a7_64701775')) {function content_5aa92cb2a338a7_64701775($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('stats','rating')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
	<table class="ls-table">
		<tbody>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['activity_active'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_active'];?>
</td>
				<td class="ls-ta-r"><?php echo number_format($_smarty_tpl->tpl_vars['stats']->value['count_active']*100/$_smarty_tpl->tpl_vars['stats']->value['count_all'],1,'.','');?>
%</td>
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['activity_passive'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_inactive'];?>
</td>
				<td class="ls-ta-r"><?php echo number_format($_smarty_tpl->tpl_vars['stats']->value['count_inactive']*100/$_smarty_tpl->tpl_vars['stats']->value['count_all'],1,'.','');?>
%</td>
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['good_users'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['rating']->value['good_users'];?>
</td>
				<td class="ls-ta-r"><?php echo number_format($_smarty_tpl->tpl_vars['rating']->value['good_users']*100/$_smarty_tpl->tpl_vars['rating']->value['total'],1,'.','');?>
%</td>
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['bad_users'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['rating']->value['bad_users'];?>
</td>
				<td class="ls-ta-r"><?php echo number_format($_smarty_tpl->tpl_vars['rating']->value['bad_users']*100/$_smarty_tpl->tpl_vars['rating']->value['total'],1,'.','');?>
%</td>
			</tr>
		</tbody>
	</table>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'admin:block','title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['activity'],'mods'=>'nopadding','content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>
<?php }} ?>