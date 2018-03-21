<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:57:14
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-menu/section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11696874865ab1052a6ea045-15509810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e8730687d54f1f01807aaab68c301dcab2072ed' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-menu/section.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11696874865ab1052a6ea045-15509810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'section' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'uid' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1052a717a46_22337037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1052a717a46_22337037')) {function content_5ab1052a717a46_22337037($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-menu-section', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('section','uid','mods','classes','attributes')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['section']->value->HasItems()){?>
    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." has-submenu", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['section']->value->GetActive()){?>
    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." active", null, 0);?>
<?php }?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
 open js-menu-section" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['uid']->value){?>data-uid="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"<?php }?>>
    <a <?php if (!$_smarty_tpl->tpl_vars['section']->value->HasItems()){?>href="<?php echo $_smarty_tpl->tpl_vars['section']->value->GetUrlFull();?>
"<?php }else{ ?>href="#"<?php }?>
       class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item <?php if ($_smarty_tpl->tpl_vars['section']->value->HasItems()){?>js-menu-section-toggle<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['section']->value->getIcon()){?>
            <?php echo smarty_function_component(array('_default_short'=>'admin:icon','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-icon",'icon'=>$_smarty_tpl->tpl_vars['section']->value->getIcon()),$_smarty_tpl);?>

        <?php }else{ ?>
            <i class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-icon <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-icon-custom <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-icon-custom--<?php echo $_smarty_tpl->tpl_vars['section']->value->GetName();?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value->GetCaption(), ENT_QUOTES, 'UTF-8', true);?>
"></i>
        <?php }?>

        <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value->GetCaption(), ENT_QUOTES, 'UTF-8', true);?>
</span>
    </a>

    
    <?php if ($_smarty_tpl->tpl_vars['section']->value->HasItems()){?>
        <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-submenu">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['section']->value->GetItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-submenu-item <?php if ($_smarty_tpl->tpl_vars['item']->value->GetActive()){?>active<?php }?>">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetUrlFull();?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value->GetColor()){?>style="color: <?php echo $_smarty_tpl->tpl_vars['item']->value->GetColor();?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->GetCaption(), ENT_QUOTES, 'UTF-8', true);?>
</a>
                </li>
            <?php } ?>
        </ul>
    <?php }?>
</div><?php }} ?>