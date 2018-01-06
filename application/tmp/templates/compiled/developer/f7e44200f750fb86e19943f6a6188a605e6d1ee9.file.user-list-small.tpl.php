<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/user/user-list-small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17862788575a462de6a7ff23-22420624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7e44200f750fb86e19943f6a6188a605e6d1ee9' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/user/user-list-small.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17862788575a462de6a7ff23-22420624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'users' => 0,
    'hideableEmptyAlert' => 0,
    'aLang' => 0,
    'selectable' => 0,
    'show' => 0,
    'component' => 0,
    'classes' => 0,
    'mods' => 0,
    'attributes' => 0,
    'user' => 0,
    'exclude' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de6ab3b75_34982880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de6ab3b75_34982880')) {function content_5a462de6ab3b75_34982880($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('user-list-small', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('exclude','hideableEmptyAlert','selectable','show','title','users','mods','classes','attributes')),$_smarty_tpl);?>



<?php if ($_smarty_tpl->tpl_vars['title']->value){?>
    <h3 class="user-list-small-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
<?php }?>


<?php if (!$_smarty_tpl->tpl_vars['users']->value||$_smarty_tpl->tpl_vars['hideableEmptyAlert']->value){?>
    <?php echo smarty_function_component(array('_default_short'=>'blankslate','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['empty'],'classes'=>'js-user-list-small-empty','visible'=>!$_smarty_tpl->tpl_vars['users']->value),$_smarty_tpl);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['selectable']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." selectable", null, 0);?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['users']->value||!(($tmp = @$_smarty_tpl->tpl_vars['show']->value)===null||$tmp==='' ? true : $tmp)){?>
    <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 js-user-list-small <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
 <?php if (!(($tmp = @$_smarty_tpl->tpl_vars['show']->value)===null||$tmp==='' ? true : $tmp)){?>style="display: none"<?php }?>>
        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['userContainer'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value, null, 0);?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->getUser()){?>
                <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getUser(), null, 0);?>
            <?php }?>

            <?php if (!$_smarty_tpl->tpl_vars['exclude']->value||!in_array($_smarty_tpl->tpl_vars['user']->value->getId(),$_smarty_tpl->tpl_vars['exclude']->value)){?>
                
                    <?php echo smarty_function_component(array('_default_short'=>'user','template'=>'list-small-item','user'=>$_smarty_tpl->tpl_vars['user']->value,'selectable'=>$_smarty_tpl->tpl_vars['selectable']->value),$_smarty_tpl);?>

                
            <?php }?>
        <?php } ?>
    </ul>
<?php }?><?php }} ?>