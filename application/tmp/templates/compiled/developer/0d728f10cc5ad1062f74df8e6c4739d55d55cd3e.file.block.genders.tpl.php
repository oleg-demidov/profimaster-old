<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 20:07:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/blocks/block.genders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12909758895aa92cb29d0485-56424636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d728f10cc5ad1062f74df8e6c4739d55d55cd3e' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/blocks/block.genders.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12909758895aa92cb29d0485-56424636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stats' => 0,
    'aLang' => 0,
    'iUsersSexOtherPerc' => 0,
    'iUsersSexManPerc' => 0,
    'iUsersSexWomanPerc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92cb29f0bf9_31000462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92cb29f0bf9_31000462')) {function content_5aa92cb29f0bf9_31000462($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('stats')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
	
	<?php $_smarty_tpl->tpl_vars['iUsersSexOtherPerc'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['stats']->value['count_sex_other']*100/$_smarty_tpl->tpl_vars['stats']->value['count_all'],1,'.',''), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['iUsersSexManPerc'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['stats']->value['count_sex_man']*100/$_smarty_tpl->tpl_vars['stats']->value['count_all'],1,'.',''), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['iUsersSexWomanPerc'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['stats']->value['count_sex_woman']*100/$_smarty_tpl->tpl_vars['stats']->value['count_all'],1,'.',''), null, 0);?>

	<div id="admin_users_sex_pie_graph"></div>

	
	<script>
		$(function () {
			$('#admin_users_sex_pie_graph').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					height: 250,
					width: 250,
					spacingBottom: 0,
					spacingLeft: 0,
					spacingRight: 0,
					spacingTop: 0
				},
				title: {
					text: ''
				},
				tooltip: {
					animation: false,
					shadow: false,
					borderWidth: 0
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						}
					}
				},
				series: [{
					type: 'pie',
					name: '<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['percent_from_all'];?>
',
					data: [
						{
							name: '<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_other'];?>
',
							y: <?php echo $_smarty_tpl->tpl_vars['iUsersSexOtherPerc']->value;?>
,
							color: '#C5C5C5'
						},
						{
							name: '<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_man'];?>
',
							y: <?php echo $_smarty_tpl->tpl_vars['iUsersSexManPerc']->value;?>
,
							color: '#94E3E6'
						},
						{
							name: '<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_woman'];?>
',
							y: <?php echo $_smarty_tpl->tpl_vars['iUsersSexWomanPerc']->value;?>
,
							color: '#FACBFF'
						}
					]
				}]
			});
		});
	</script>

	<table class="ls-table ls-table--noborders ls-table--condensed chart-pie-legend">
		<tbody>
			<tr>
				<td class="cell-color"><span class="chart-pie-legend-color chart-pie-legend-color-grey"></span></td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_other'];?>

				</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_sex_other'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['iUsersSexOtherPerc']->value;?>
%</td>
			</tr>
			<tr>
				<td class="cell-color"><span class="chart-pie-legend-color chart-pie-legend-color-blue"></span></td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_man'];?>

				</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_sex_man'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['iUsersSexManPerc']->value;?>
%</td>
			</tr>
			<tr>
				<td class="cell-color"><span class="chart-pie-legend-color chart-pie-legend-color-purple"></span></td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['sex_woman'];?>

				</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_sex_woman'];?>
</td>
				<td class="ls-ta-r"><?php echo $_smarty_tpl->tpl_vars['iUsersSexWomanPerc']->value;?>
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

<?php echo smarty_function_component(array('_default_short'=>'admin:block','title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['gender_stats'],'classes'=>'p-user-genders','content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>
<?php }} ?>