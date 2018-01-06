<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/dropdown-select/dropdown-select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21392254595a4634f80f0b71-09087790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4fe95c204b58e9722ec0ffaae10ae2ca273908d' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/dropdown-select/dropdown-select.tpl',
      1 => 1514341554,
      2 => 'file',
    ),
    'b64a1274b4533e216b8e88b18ef02d1c3fbd2f6e' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/dropdown/dropdown.tpl',
      1 => 1509261714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21392254595a4634f80f0b71-09087790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'text' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'isSplit' => 0,
    'icon' => 0,
    'activeItem' => 0,
    'menu' => 0,
    'navMods' => 0,
    'isSubnav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f8125cd1_93727936',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f8125cd1_93727936')) {function content_5a4634f8125cd1_93727936($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-dropdown', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('text','icon','activeItem','isSplit','menu','mods','classes','attributes','navMods','isSubnav')),$_smarty_tpl);?>


<?php if (!$_smarty_tpl->tpl_vars['text']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." no-text", null, 0);?>
<?php }?>


    <?php echo smarty_function_component_define_params(array('params'=>array('aItems','selectedItem')),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." js-dropdown-select", null, 0);?>

    <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aItems']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_smarty_tpl->tpl_vars['selectedItem']->value&&$_tmp1){?>
        <?php $_smarty_tpl->tpl_vars['selectedItem'] = new Smarty_variable($_smarty_tpl->tpl_vars['aItems']->value[0]['value'], null, 0);?>
    <?php }?>
    
    <?php  $_smarty_tpl->tpl_vars["aItem"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aItem"]->_loop = false;
 $_smarty_tpl->tpl_vars["dskey"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aItem"]->key => $_smarty_tpl->tpl_vars["aItem"]->value){
$_smarty_tpl->tpl_vars["aItem"]->_loop = true;
 $_smarty_tpl->tpl_vars["dskey"]->value = $_smarty_tpl->tpl_vars["aItem"]->key;
?>
        <?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[$_smarty_tpl->tpl_vars['dskey']->value]['name'] = "n".((string)$_smarty_tpl->tpl_vars['aItem']->value['value']);?>
        <?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[$_smarty_tpl->tpl_vars['dskey']->value]['attributes'] = array('data-value'=>$_smarty_tpl->tpl_vars['aItem']->value['value']);?>
        <?php if ($_smarty_tpl->tpl_vars['aItem']->value['value']==$_smarty_tpl->tpl_vars['selectedItem']->value){?>
            <?php $_smarty_tpl->tpl_vars['text'] = new Smarty_variable($_smarty_tpl->tpl_vars['aItem']->value['text'], null, 0);?>  
            <?php $_smarty_tpl->tpl_vars['icon'] = new Smarty_variable($_smarty_tpl->tpl_vars['aItem']->value['icon'], null, 0);?> 
        <?php }?>
    <?php } ?>
    
    <?php $_smarty_tpl->tpl_vars['activeItem'] = new Smarty_variable("n".((string)$_smarty_tpl->tpl_vars['selectedItem']->value), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable($_smarty_tpl->tpl_vars['params']->value['mods'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['menu'] = new Smarty_variable($_smarty_tpl->tpl_vars['aItems']->value, null, 0);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php if ($_smarty_tpl->tpl_vars['isSplit']->value){?>
        <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'button','type'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-toggle js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-toggle",'mods'=>((string)$_smarty_tpl->tpl_vars['mods']->value)." no-text",'attributes'=>array_merge((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp),array('aria-haspopup'=>'true','aria-expanded'=>'false'))),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','buttons'=>array(array('text'=>$_smarty_tpl->tpl_vars['text']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value,'attributes'=>array('tabindex'=>-1)),$_tmp1)),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'button','type'=>'button','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-toggle js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-toggle",'mods'=>$_smarty_tpl->tpl_vars['mods']->value,'text'=>$_smarty_tpl->tpl_vars['text']->value,'icon'=>$_smarty_tpl->tpl_vars['icon']->value,'attributes'=>array_merge((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp),array('aria-haspopup'=>'true','aria-expanded'=>'false'))),$_smarty_tpl);?>

    <?php }?>

    
    <?php echo smarty_function_component(array('_default_short'=>'dropdown','template'=>'menu','activeItem'=>$_smarty_tpl->tpl_vars['activeItem']->value,'items'=>$_smarty_tpl->tpl_vars['menu']->value,'mods'=>$_smarty_tpl->tpl_vars['navMods']->value,'isSubnav'=>$_smarty_tpl->tpl_vars['isSubnav']->value),$_smarty_tpl);?>

</div>
<?php }} ?>