<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:22:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-form/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17234445635ab0fd16b0d0b1-37394948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8101a015b2e220b234464532c6eab45715f9db96' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-form/form.tpl',
      1 => 1506863676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17234445635ab0fd16b0d0b1-37394948',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'method' => 0,
    'isEdit' => 0,
    'aLang' => 0,
    'submit' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'form' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0fd16b30702_09156012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0fd16b30702_09156012')) {function content_5ab0fd16b30702_09156012($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('form','action','method','submit','isEdit','mods','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['action'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['action']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['method'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['method']->value)===null||$tmp==='' ? 'post' : $tmp), null, 0);?>

<?php $_smarty_tpl->tpl_vars['submit'] = new Smarty_variable(array_merge(array('text'=>$_smarty_tpl->tpl_vars['isEdit']->value ? $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['save'] : $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['add'],'name'=>'submit','value'=>1,'mods'=>'primary'),(($tmp = @$_smarty_tpl->tpl_vars['submit']->value)===null||$tmp==='' ? array() : $tmp)), null, 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'hidden.security-key'),$_smarty_tpl);?>


    <?php if (is_array($_smarty_tpl->tpl_vars['form']->value)){?>
        <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['form']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
            <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>$_smarty_tpl->tpl_vars['field']->value['field'],'params'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

        <?php } ?>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

    <?php }?>

    <?php echo smarty_function_component(array('_default_short'=>'admin:button','params'=>$_smarty_tpl->tpl_vars['submit']->value),$_smarty_tpl);?>

</form><?php }} ?>