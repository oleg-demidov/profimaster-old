<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:34
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-plugin/star-rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16420019295a4a11c6dd32c2-36514138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce10f51e3e18ce9fb7b35c816aeed4a9e020e975' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-plugin/star-rating.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16420019295a4a11c6dd32c2-36514138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'rating' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11c6de7878_26478436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11c6de7878_26478436')) {function content_5a4a11c6de7878_26478436($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('star-rating', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('rating','count','mods','classes','attributes')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-stars ls-clearfix" title="Средняя оценка: <?php echo $_smarty_tpl->tpl_vars['rating']->value/20;?>
">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['stars'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['name'] = 'stars';
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'] = (int)10;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'] = ((int)20) == 0 ? 1 : (int)20;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop'] = is_array($_loop=100) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['stars']['total']);
?><li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item <?php if ($_smarty_tpl->tpl_vars['rating']->value>=$_smarty_tpl->getVariable('smarty')->value['section']['stars']['index']+10){?><?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item--full<?php }elseif($_smarty_tpl->tpl_vars['rating']->value>=$_smarty_tpl->getVariable('smarty')->value['section']['stars']['index']){?><?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item--half<?php }?>"></li><?php endfor; endif; ?>
    </ul>

    <?php if (isset($_smarty_tpl->tpl_vars['count']->value)){?>
        <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-count"><?php echo smarty_function_lang(array('_default_short'=>'plugin.admin.plugins.install.reviews_declension','count'=>$_smarty_tpl->tpl_vars['count']->value,'plural'=>true),$_smarty_tpl);?>
</span>
    <?php }?>
</div><?php }} ?>