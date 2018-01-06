<?php /* Smarty version Smarty-3.1.13, created on 2017-12-30 14:57:15
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/table/sorting-cell.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7804696305a4754ebe5bd62-92725710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43bca6334ae61346290284fb38168234e2898d50' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/table/sorting-cell.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7804696305a4754ebe5bd62-92725710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sCellClassName' => 0,
    'mSortingOrder' => 0,
    'mLinkHtml' => 0,
    'sDropDownHtml' => 0,
    'sOrder' => 0,
    'sWay' => 0,
    'sSortingOrderItem' => 0,
    'bSortedByCurrentField' => 0,
    'sReverseOrder' => 0,
    'bDropDownMenu' => 0,
    'sBaseUrl' => 0,
    'sWayForThisOrder' => 0,
    'iKey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4754ebe7e358_87353178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4754ebe7e358_87353178')) {function content_5a4754ebe7e358_87353178($_smarty_tpl) {?><?php if (!is_callable('smarty_function_request_filter')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.request_filter.php';
?>

<th class="cell-<?php echo $_smarty_tpl->tpl_vars['sCellClassName']->value;?>
">
	<?php if (!is_array($_smarty_tpl->tpl_vars['mSortingOrder']->value)){?>
		<?php $_smarty_tpl->tpl_vars['mSortingOrder'] = new Smarty_variable(array($_smarty_tpl->tpl_vars['mSortingOrder']->value), null, 0);?>
	<?php }?>

	<?php if (!is_array($_smarty_tpl->tpl_vars['mLinkHtml']->value)){?>
		<?php $_smarty_tpl->tpl_vars['mLinkHtml'] = new Smarty_variable(array($_smarty_tpl->tpl_vars['mLinkHtml']->value), null, 0);?>
	<?php }?>

	
	<?php if (count($_smarty_tpl->tpl_vars['mSortingOrder']->value)>1){?>
		<?php $_smarty_tpl->tpl_vars['bDropDownMenu'] = new Smarty_variable(true, null, 0);?>

		
		<div class="ls-dropdown ls-dropdown--no-text js-dropdown" >
			<span class="link-dotted js-ls-dropdown-toggle">
				
				<?php echo $_smarty_tpl->tpl_vars['sDropDownHtml']->value;?>
&hellip;

				
				<?php if (in_array($_smarty_tpl->tpl_vars['sOrder']->value,$_smarty_tpl->tpl_vars['mSortingOrder']->value)){?>
					<?php if ($_smarty_tpl->tpl_vars['sWay']->value=='asc'){?>
						<i class="fa fa-sort-up"></i>
					<?php }elseif($_smarty_tpl->tpl_vars['sWay']->value=='desc'){?>
						<i class="fa fa-sort-desc"></i>
					<?php }?>
				<?php }?>
			</span>

			
			<ul class="ls-nav ls-nav--stacked ls-nav--dropdown ls-dropdown-menu js-ls-dropdown-menu  ls-clearfix" role="menu" aria-hidden="true">
	<?php }?>

	
	<?php  $_smarty_tpl->tpl_vars['sSortingOrderItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sSortingOrderItem']->_loop = false;
 $_smarty_tpl->tpl_vars['iKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mSortingOrder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sSortingOrderItem']->key => $_smarty_tpl->tpl_vars['sSortingOrderItem']->value){
$_smarty_tpl->tpl_vars['sSortingOrderItem']->_loop = true;
 $_smarty_tpl->tpl_vars['iKey']->value = $_smarty_tpl->tpl_vars['sSortingOrderItem']->key;
?>
		
		<?php $_smarty_tpl->tpl_vars['bSortedByCurrentField'] = new Smarty_variable($_smarty_tpl->tpl_vars['sOrder']->value==$_smarty_tpl->tpl_vars['sSortingOrderItem']->value, null, 0);?>

		
		<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['bSortedByCurrentField']->value){?><?php echo (string)$_smarty_tpl->tpl_vars['sReverseOrder']->value;?><?php }else{ ?><?php echo (string)$_smarty_tpl->tpl_vars['sWay']->value;?><?php }?><?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sWayForThisOrder'] = new Smarty_variable($_tmp1, null, 0);?>

		
		<?php if ($_smarty_tpl->tpl_vars['bDropDownMenu']->value){?>
			<li class="ls-nav-item active"  role="menuitem">
		<?php }?>

		
		<a href="<?php echo $_smarty_tpl->tpl_vars['sBaseUrl']->value;?>
<?php echo smarty_function_request_filter(array('name'=>array('order_field','order_way'),'value'=>array($_smarty_tpl->tpl_vars['sSortingOrderItem']->value,$_smarty_tpl->tpl_vars['sWayForThisOrder']->value)),$_smarty_tpl);?>
" class="ls-nav-item-link"><?php echo $_smarty_tpl->tpl_vars['mLinkHtml']->value[$_smarty_tpl->tpl_vars['iKey']->value];?>


			
			<?php if ($_smarty_tpl->tpl_vars['bSortedByCurrentField']->value){?>
				<?php if ($_smarty_tpl->tpl_vars['sWay']->value=='asc'){?>
					<i class="fa fa-sort-up"></i>
				<?php }elseif($_smarty_tpl->tpl_vars['sWay']->value=='desc'){?>
					<i class="fa fa-sort-desc"></i>
				<?php }?>
			<?php }?>
		</a>

		
		<?php if ($_smarty_tpl->tpl_vars['bDropDownMenu']->value){?>
			</li>
		<?php }?>
	<?php } ?>

	
	<?php if ($_smarty_tpl->tpl_vars['bDropDownMenu']->value){?>
		</ul><div>
	<?php }?>
</th><?php }} ?>