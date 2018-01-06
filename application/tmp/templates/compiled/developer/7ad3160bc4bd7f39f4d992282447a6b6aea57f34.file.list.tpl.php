<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:51:59
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-rbac/role/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4070380135a4e3f8f9fc601-92919926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ad3160bc4bd7f39f4d992282447a6b6aea57f34' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-rbac/role/list.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4070380135a4e3f8f9fc601-92919926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'roles' => 0,
    'roleWrapper' => 0,
    'role' => 0,
    'level' => 0,
    'iCount' => 0,
    'aLang' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3f8fa34b87_81206619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3f8fa34b87_81206619')) {function content_5a4e3f8fa34b87_81206619($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-rbac-role-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('roles')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['roles']->value){?>
    <table class="ls-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Код</th>
                <th align="center">Пользователей</th>
                <th align="center">Разрешений</th>
                <th align="center">Статус</th>
                <th class="ls-table-cell-actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['roleWrapper'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['roleWrapper']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['roleWrapper']->key => $_smarty_tpl->tpl_vars['roleWrapper']->value){
$_smarty_tpl->tpl_vars['roleWrapper']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['role'] = new Smarty_variable($_smarty_tpl->tpl_vars['roleWrapper']->value['entity'], null, 0);?>
                <?php $_smarty_tpl->tpl_vars['level'] = new Smarty_variable($_smarty_tpl->tpl_vars['roleWrapper']->value['level'], null, 0);?>

                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['role']->value->getId();?>
">
                    <td>
                        <i class="fa fa-file" style="margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px;"></i>
                        <?php echo $_smarty_tpl->tpl_vars['role']->value->getTitle();?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['role']->value->getCode();?>
</td>
                    <td align="center">
                        <?php if ($_smarty_tpl->tpl_vars['role']->value->getCode()==ModuleRbac::ROLE_CODE_GUEST){?>
                            &mdash;
                        <?php }else{ ?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['role']->value->getUrlAdminAction('users');?>
"><?php $_smarty_tpl->tpl_vars['iCount'] = new Smarty_variable($_smarty_tpl->tpl_vars['role']->value->getCountUsers(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['iCount']->value){?><?php echo $_smarty_tpl->tpl_vars['iCount']->value;?>
<?php }else{ ?>&mdash;<?php }?></a>
                        <?php }?>
                    </td>
                    <td align="center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['role']->value->getUrlAdminAction('permissions');?>
"><?php $_smarty_tpl->tpl_vars['iCount'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['role']->value->getPermissions()), null, 0);?><?php if ($_smarty_tpl->tpl_vars['iCount']->value){?><?php echo $_smarty_tpl->tpl_vars['iCount']->value;?>
<?php }else{ ?>&mdash;<?php }?></a>
                    </td>
                    <td align="center">
                        <?php if ($_smarty_tpl->tpl_vars['role']->value->getState()==ModuleRbac::ROLE_STATE_ACTIVE){?>
                            <span class="fa fa-eye"></span>
                        <?php }else{ ?>
                            <span class="fa fa-eye-slash"></span>
                        <?php }?>
                    </td>
                    <td class="ls-table-cell-actions">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['role']->value->getUrlAdminAction('update');?>
" class="fa fa-edit" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['edit'];?>
"></a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['role']->value->getUrlAdminAction('remove');?>
?security_ls_key=<?php echo $_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value;?>
" class="fa fa-trash-o js-confirm-remove" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['delete'];?>
"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    <?php echo smarty_function_component(array('_default_short'=>'admin:blankslate','text'=>'Нет ролей'),$_smarty_tpl);?>

<?php }?><?php }} ?>