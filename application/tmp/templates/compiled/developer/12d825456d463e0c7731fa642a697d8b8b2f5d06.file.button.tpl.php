<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:14
         compiled from "/var/www/profimaster/framework/frontend/components/button/button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19728666925a4e49ee120396-81753672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12d825456d463e0c7731fa642a697d8b8b2f5d06' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/button/button.tpl',
      1 => 1509350307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19728666925a4e49ee120396-81753672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'icon' => 0,
    'text' => 0,
    'url' => 0,
    'type' => 0,
    'tag' => 0,
    'value' => 0,
    'name' => 0,
    '_aRequest' => 0,
    'isDisabled' => 0,
    'form' => 0,
    'id' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'badge' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ee145a52_52072939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ee145a52_52072939')) {function content_5a4e49ee145a52_52072939($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-button', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('type','text','value','url','id','name','badge','isDisabled','form','icon','mods','classes','attributes')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['icon']->value&&!$_smarty_tpl->tpl_vars['text']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." icon", null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars['tag'] = new Smarty_variable($_smarty_tpl->tpl_vars['url']->value ? 'a' : 'button', null, 0);?>
<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 'submit' : $tmp), null, 0);?>


<<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>

        <?php if (!$_smarty_tpl->tpl_vars['url']->value){?>
            type="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"
            value="<?php if ($_smarty_tpl->tpl_vars['value']->value){?><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['_aRequest']->value[$_smarty_tpl->tpl_vars['name']->value])){?><?php echo $_smarty_tpl->tpl_vars['_aRequest']->value[$_smarty_tpl->tpl_vars['name']->value];?>
<?php }?>"
            <?php if ($_smarty_tpl->tpl_vars['isDisabled']->value){?>disabled<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['form']->value){?>form="<?php echo $_smarty_tpl->tpl_vars['form']->value;?>
"<?php }?>
        <?php }else{ ?>
            href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"
            role="button"
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['id']->value){?>id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['name']->value){?>name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?>
        class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
"
        <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php if ($_smarty_tpl->tpl_vars['icon']->value){?>
        <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>$_smarty_tpl->tpl_vars['icon']->value,'attributes'=>array('aria-hidden'=>'true')),$_smarty_tpl);?>

    <?php }?>

    
    <?php echo $_smarty_tpl->tpl_vars['text']->value;?>


    <?php if ($_smarty_tpl->tpl_vars['badge']->value){?><?php echo $_smarty_tpl->tpl_vars['badge']->value;?>

        <?php echo smarty_function_component(array('_default_short'=>'badge','params'=>array('value'=>$_smarty_tpl->tpl_vars['badge']->value)),$_smarty_tpl);?>

    <?php }?>
</<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
><?php }} ?>