<?php /* Smarty version Smarty-3.1.13, created on 2017-12-26 16:05:58
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-category/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18545165205a421f06973817-38517914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a7eb72b7f7bc635ce62d5a6b83ea1ef868bca69' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-category/list.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18545165205a421f06973817-38517914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'categoryWrapper' => 0,
    'category' => 0,
    'level' => 0,
    'aLang' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a421f0698b329_16391202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a421f0698b329_16391202')) {function content_5a421f0698b329_16391202($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-category-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('categories')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['categories']->value){?>
    <table class="ls-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>URL</th>
                <th>Элементов</th>
                <th class="ls-table-cell-actions">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['categoryWrapper'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryWrapper']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryWrapper']->key => $_smarty_tpl->tpl_vars['categoryWrapper']->value){
$_smarty_tpl->tpl_vars['categoryWrapper']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['category'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryWrapper']->value['entity'], null, 0);?>
                <?php $_smarty_tpl->tpl_vars['level'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryWrapper']->value['level'], null, 0);?>

                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">
                    <td>
                        <i class="fa fa-file" style="margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px;"></i>

                        <?php if ($_smarty_tpl->tpl_vars['category']->value->getWebUrl()){?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value->getWebUrl();?>
" border="0"><?php echo $_smarty_tpl->tpl_vars['category']->value->getTitle();?>
</a>
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['category']->value->getTitle();?>

                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getUrlFull();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getCountTargetOfDescendants();?>
</td>
                    <td class="ls-table-cell-actions">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value->getUrlAdminUpdate();?>
" class="fa fa-edit" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['edit'];?>
"></a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value->getUrlAdminRemove();?>
?security_ls_key=<?php echo $_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value;?>
" class="fa fa-trash-o js-confirm-remove" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['delete'];?>
"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    <?php echo smarty_function_component(array('_default_short'=>'admin:blankslate','text'=>'Нет категорий. Вы можете добавить новую.'),$_smarty_tpl);?>

<?php }?><?php }} ?>