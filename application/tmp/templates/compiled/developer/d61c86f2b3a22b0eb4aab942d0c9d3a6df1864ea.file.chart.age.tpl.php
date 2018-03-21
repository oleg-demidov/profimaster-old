<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 20:07:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/charts/chart.age.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13984103645aa92cb2a35d53-09641853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd61c86f2b3a22b0eb4aab942d0c9d3a6df1864ea' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/charts/chart.age.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13984103645aa92cb2a35d53-09641853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'component' => 0,
    'title' => 0,
    'aLang' => 0,
    'item' => 0,
    'percentage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92cb2a4e5d5_46798465',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92cb2a4e5d5_46798465')) {function content_5aa92cb2a4e5d5_46798465($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-chart-age', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('data','title')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['data']->value&&$_smarty_tpl->tpl_vars['data']->value['collection']&&count($_smarty_tpl->tpl_vars['data']->value['collection'])>0){?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
        <h3 class="page-sub-header"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>

        <?php if (count($_smarty_tpl->tpl_vars['data']->value['collection'])<20){?>
            <?php echo smarty_function_component(array('_default_short'=>'admin:alert','text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['need_more_data'],'mods'=>'info'),$_smarty_tpl);?>

        <?php }?>

        <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-items"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['collection']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['percentage'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['item']->value['count']*100/$_smarty_tpl->tpl_vars['data']->value['max_one_age_users_count'],2,'.',''), null, 0);?><li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item"><div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item-bar" style="height: <?php echo $_smarty_tpl->tpl_vars['percentage']->value;?>
%;" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['users'];?>
"></div><div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item-value" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['users'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['years_old'];?>
</div></li><?php } ?></ul>
    </div>
<?php }?><?php }} ?>