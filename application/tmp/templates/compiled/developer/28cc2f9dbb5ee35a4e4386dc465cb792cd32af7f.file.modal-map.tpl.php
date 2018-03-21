<?php /* Smarty version Smarty-3.1.13, created on 2018-03-16 23:46:55
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/modal-map/modal-map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5755662245aac030fb3c235-57663686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28cc2f9dbb5ee35a4e4386dc465cb792cd32af7f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/modal-map/modal-map.tpl',
      1 => 1519719435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5755662245aac030fb3c235-57663686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'oGeo' => 0,
    'text' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'icon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aac030fb4e967_82533606',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aac030fb4e967_82533606')) {function content_5aac030fb4e967_82533606($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-modal-map', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oGeo','url','icon','text','mods','classes','attributes')),$_smarty_tpl);?>


<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['url']->value)===null||$tmp==='' ? '#' : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_tmp1, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['oGeo']->value){?>
    <?php $_smarty_tpl->createLocalArrayVariable('attributes', null, 0);
$_smarty_tpl->tpl_vars['attributes']->value['data-lat'] = $_smarty_tpl->tpl_vars['oGeo']->value->getLat();?>
    <?php $_smarty_tpl->createLocalArrayVariable('attributes', null, 0);
$_smarty_tpl->tpl_vars['attributes']->value['data-long'] = $_smarty_tpl->tpl_vars['oGeo']->value->getLong();?>
    <?php $_smarty_tpl->createLocalArrayVariable('attributes', null, 0);
$_smarty_tpl->tpl_vars['attributes']->value['data-zoom'] = $_smarty_tpl->tpl_vars['oGeo']->value->getZoom();?>
<?php }?>

<a  href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" 
    title="<?php echo $_smarty_tpl->tpl_vars['text']->value;?>
"
    class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
"      
    <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
        <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['icon']->value)===null||$tmp==='' ? 'map-marker' : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>$_tmp2),$_smarty_tpl);?>
 
        <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

</a>
<?php }} ?>