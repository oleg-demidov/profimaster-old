<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/user/user-list-small-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17974175395a462de6ab6021-47355165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fe4c9961660dfb9bbd34b6045ac459c1dcd86d3' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/user/user-list-small-item.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17974175395a462de6ab6021-47355165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'component' => 0,
    'classes' => 0,
    'userId' => 0,
    'attributes' => 0,
    'selectable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de6ac4032_52146424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de6ac4032_52146424')) {function content_5a462de6ac4032_52146424($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('user-list-small-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('selectable','user','mods','classes','attributes')),$_smarty_tpl);?>



    <?php $_smarty_tpl->tpl_vars['userId'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getId(), null, 0);?>


<li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 js-user-list-small-item <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" data-user-id="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php if ($_smarty_tpl->tpl_vars['selectable']->value){?>
        <input type="checkbox" class="js-user-list-small-checkbox" data-user-id="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" data-user-login="<?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
" />
    <?php }?>

    
    
        <?php echo smarty_function_component(array('_default_short'=>'user','template'=>'avatar','size'=>'xxsmall','mods'=>'inline','user'=>$_smarty_tpl->tpl_vars['user']->value),$_smarty_tpl);?>

    
</li><?php }} ?>