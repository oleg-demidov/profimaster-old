<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:48
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/user-small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20539789705a4a11d43a7787-13280384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '442d201d1c3a05437e9aa76837464be12f74c9c1' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/user-small.tpl',
      1 => 1502003377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20539789705a4a11d43a7787-13280384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUser' => 0,
    'mods' => 0,
    'component' => 0,
    'classes' => 0,
    'userId' => 0,
    'attributes' => 0,
    'selectable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11d43bf694_33885770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11d43bf694_33885770')) {function content_5a4a11d43bf694_33885770($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-list-small-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('selectable','oUser','mods','classes','attributes')),$_smarty_tpl);?>



    <?php $_smarty_tpl->tpl_vars['userId'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->getId(), null, 0);?>


<?php if (!$_smarty_tpl->tpl_vars['mods']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->getPro(), null, 0);?>
<?php }?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 js-user-list-small-item <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" data-user-id="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php if ($_smarty_tpl->tpl_vars['selectable']->value){?>
        <input type="checkbox" class="js-user-list-small-checkbox" data-user-id="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" data-user-login="<?php echo $_smarty_tpl->tpl_vars['oUser']->value->getLogin();?>
" />
    <?php }?>

    
    
        <?php echo smarty_function_component(array('_default_short'=>'user','template'=>'avatar','size'=>'xxsmall','mods'=>'inline','user'=>$_smarty_tpl->tpl_vars['oUser']->value),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->tpl_vars['mods']->value=='Pro'||$_smarty_tpl->tpl_vars['mods']->value=='Profi'){?>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mods']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'badge','value'=>$_tmp1,'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-".((string)$_smarty_tpl->tpl_vars['mods']->value)),$_smarty_tpl);?>

    <?php }?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-rating"><?php echo $_smarty_tpl->tpl_vars['oUser']->value->getRating();?>
</div>
</div><?php }} ?>