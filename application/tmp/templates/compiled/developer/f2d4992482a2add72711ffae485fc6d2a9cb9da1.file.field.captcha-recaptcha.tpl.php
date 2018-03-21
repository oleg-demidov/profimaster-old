<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:25
         compiled from "/var/www/profimaster/framework/frontend/components/field/field.captcha-recaptcha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10491128985ab104f9e177e2-32882493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2d4992482a2add72711ffae485fc6d2a9cb9da1' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/field/field.captcha-recaptcha.tpl',
      1 => 1505535715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10491128985ab104f9e177e2-32882493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'uid' => 0,
    'captchaName' => 0,
    'name' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab104f9e27521_40898942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab104f9e27521_40898942')) {function content_5ab104f9e27521_40898942($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-field', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('id','captchaName','name','mods','attributes','classes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." recaptcha", null, 0);?>
<?php $_smarty_tpl->tpl_vars['uid'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['id']->value)===null||$tmp==='' ? (($_smarty_tpl->tpl_vars['component']->value).(mt_rand())) : $tmp), null, 0);?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" data-type="recaptcha" data-lsrecaptcha-captcha-name="<?php echo $_smarty_tpl->tpl_vars['captchaName']->value;?>
" data-lsrecaptcha-name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
></div>
<a href="#" id="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
-reset">Обновить каптчу</a><br/><?php }} ?>