<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 11:44:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/top-master-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3329599345aaf4e501f5d72-66634171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3316fb77a16998e531f03a7274cd6064531f9e0' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/top-master-item.tpl',
      1 => 1511176797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3329599345aaf4e501f5d72-66634171',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oMaster' => 0,
    'aWorks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aaf4e50203441_28707540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaf4e50203441_28707540')) {function content_5aaf4e50203441_28707540($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-top-master-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oMaster')),$_smarty_tpl);?>



<table class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <tr><td rowspan="2">
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:user','template'=>'avatar','user'=>$_smarty_tpl->tpl_vars['oMaster']->value,'isName'=>0),$_smarty_tpl);?>

    </td><td>
        <a href='<?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getUserWebPath();?>
'><?php echo $_smarty_tpl->tpl_vars['oMaster']->value->getProfileName();?>
</a>
        <?php echo smarty_function_component(array('_default_short'=>'badge','value'=>$_smarty_tpl->tpl_vars['oMaster']->value->getPro()),$_smarty_tpl);?>

    </td></tr>
        
    <tr><td>
        <?php $_smarty_tpl->tpl_vars['aWorks'] = new Smarty_variable($_smarty_tpl->tpl_vars['oMaster']->value->getWorks(3), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['aWorks']->value){?>
            <?php echo smarty_function_component(array('_default_short'=>'freelancer:portfolio.work.small.list','aWorks'=>$_smarty_tpl->tpl_vars['aWorks']->value),$_smarty_tpl);?>

        <?php }?>
    </td></tr>
</table><?php }} ?>