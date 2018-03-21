<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:22:49
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.stats-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14115524345ab0fd19ddb306-75170280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '552ee5679683188f2c15aa4b9d049a31e578d9dc' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.stats-content.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14115524345ab0fd19ddb306-75170280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'type' => 0,
    'aDataGrowth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0fd19dedf61_38393621',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0fd19dedf61_38393621')) {function content_5ab0fd19dedf61_38393621($_smarty_tpl) {?>

<table class="ls-table">
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = array('topics','comments','blogs','registrations'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
			<tr>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['index']["new_".((string)$_smarty_tpl->tpl_vars['type']->value)];?>

				</td>
				<td class="ls-ta-r" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['index']["new_".((string)$_smarty_tpl->tpl_vars['type']->value)."_info"];?>
">
					<?php if ($_smarty_tpl->tpl_vars['aDataGrowth']->value[$_smarty_tpl->tpl_vars['type']->value]['growth']>0){?>
						<i class="p-icon-stats-up" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['index']['new_items_for_period'];?>
: <?php echo $_smarty_tpl->tpl_vars['aDataGrowth']->value[$_smarty_tpl->tpl_vars['type']->value]['growth'];?>
"></i>
					<?php }elseif($_smarty_tpl->tpl_vars['aDataGrowth']->value[$_smarty_tpl->tpl_vars['type']->value]['growth']<0){?>
						<i class="p-icon-stats-down" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['index']['less_items_for_period'];?>
: <?php echo abs($_smarty_tpl->tpl_vars['aDataGrowth']->value[$_smarty_tpl->tpl_vars['type']->value]['growth']);?>
"></i>
					<?php }?>

					<?php echo abs($_smarty_tpl->tpl_vars['aDataGrowth']->value[$_smarty_tpl->tpl_vars['type']->value]['now_items']);?>

				</td>
				
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php }} ?>