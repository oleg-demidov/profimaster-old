<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/framework/frontend/components/avatar/avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10438513525a4e49ebd8bac3-75860794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44c16cfbc496f49a2a7d0980d2837555fdc49aa1' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/avatar/avatar.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10438513525a4e49ebd8bac3-75860794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'size' => 0,
    'name' => 0,
    'sizes' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'url' => 0,
    'image' => 0,
    'alt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebda8a95_77741282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebda8a95_77741282')) {function content_5a4e49ebda8a95_77741282($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-avatar', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('image','size','name','url','alt','mods','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['size'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['size']->value)===null||$tmp==='' ? 'default' : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sizes'] = new Smarty_variable(array('large','default','small','xsmall','xxsmall','text'), null, 0);?>



<?php if ($_smarty_tpl->tpl_vars['name']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." has-name", null, 0);?>
<?php }?>

<?php if (in_array($_smarty_tpl->tpl_vars['size']->value,$_smarty_tpl->tpl_vars['sizes']->value)){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." size-".((string)$_smarty_tpl->tpl_vars['size']->value), null, 0);?>
<?php }?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
        
        <?php if ($_smarty_tpl->tpl_vars['url']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-image-link"><?php }?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-image">
        <?php if ($_smarty_tpl->tpl_vars['url']->value){?></a><?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['name']->value){?>
            <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-name">
                <?php if ($_smarty_tpl->tpl_vars['url']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-name-link"><?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                <?php if ($_smarty_tpl->tpl_vars['url']->value){?></a><?php }?>
            </div>
        <?php }?>
    
</div><?php }} ?>