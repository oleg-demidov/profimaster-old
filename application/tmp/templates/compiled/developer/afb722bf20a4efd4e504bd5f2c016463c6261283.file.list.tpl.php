<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:09
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/contact/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20721630755a4e49e9f380a1-17741203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afb722bf20a4efd4e504bd5f2c016463c6261283' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/contact/list.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20721630755a4e49e9f380a1-17741203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'field' => 0,
    'aLang' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ea006d37_08576272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ea006d37_08576272')) {function content_5a4e49ea006d37_08576272($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-user-contact-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('fields')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['fields']->value){?>
    <table class="ls-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Тип</th>
                <th>Шаблон</th>
                <th class="ls-table-cell-actions">Действие</th>
            </tr>
        </thead>

        <tbody>
        <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
            <tr data-id="<?php echo $_smarty_tpl->tpl_vars['field']->value->getId();?>
">
                <td>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>

                </td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->getType(), ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->getPattern(), ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td class="ls-table-cell-actions">
                    <a href="<?php echo smarty_function_router(array('page'=>'admin/users/contact-fields/update'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['field']->value->getId();?>
/" class="fa fa-edit" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['edit'];?>
"></a>
                    <a href="<?php echo smarty_function_router(array('page'=>'admin/users/contact-fields/remove'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['field']->value->getId();?>
/?security_ls_key=<?php echo $_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value;?>
" class="fa fa-trash-o js-confirm-remove" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['delete'];?>
"></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    <?php echo smarty_function_component(array('_default_short'=>'admin:blankslate','text'=>'Нет контактов'),$_smarty_tpl);?>

<?php }?><?php }} ?>