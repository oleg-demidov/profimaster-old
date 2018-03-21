<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:57:14
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/components/admin/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19278078735ab1052a43dfa0-80826813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1e1156d9db7fa8b07c3a0158e84766c5733f31e' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/components/admin/list.tpl',
      1 => 1514624234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19278078735ab1052a43dfa0-80826813',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'sFullPagePathToEvent' => 0,
    'users' => 0,
    'user' => 0,
    'oBan' => 0,
    'LS' => 0,
    'oInviter' => 0,
    'session' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1052a4c01d5_66035984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1052a4c01d5_66035984')) {function content_5ab1052a4c01d5_66035984($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
if (!is_callable('smarty_function_request_filter')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.request_filter.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-user-list', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('users','pagination')),$_smarty_tpl);?>


<table class="ls-table ls-table--condensed ls-table--striped ls-table--hover p-user-list">
    <thead>
        <tr>
            <?php echo smarty_function_component(array('_default_short'=>'admin:table.sorting-cell','sCellClassName'=>'user','mSortingOrder'=>array('u.user_id','u.user_login','u.user_profile_name','u.user_mail'),'mLinkHtml'=>array($_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['id'],$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['login'],$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['profile_name'],$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['mail']),'sDropDownHtml'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['name'],'sBaseUrl'=>$_smarty_tpl->tpl_vars['sFullPagePathToEvent']->value),$_smarty_tpl);?>


            <?php echo smarty_function_component(array('_default_short'=>'admin:table.sorting-cell','sCellClassName'=>'birth','mSortingOrder'=>'u.user_profile_birthday','mLinkHtml'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['birth'],'sBaseUrl'=>$_smarty_tpl->tpl_vars['sFullPagePathToEvent']->value),$_smarty_tpl);?>


            <?php echo smarty_function_component(array('_default_short'=>'admin:table.sorting-cell','sCellClassName'=>'signup','mSortingOrder'=>array('u.user_date_register','s.session_date_last'),'mLinkHtml'=>array($_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['reg'],$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['last_visit']),'sDropDownHtml'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['reg_and_last_visit'],'sBaseUrl'=>$_smarty_tpl->tpl_vars['sFullPagePathToEvent']->value),$_smarty_tpl);?>


            <?php echo smarty_function_component(array('_default_short'=>'admin:table.sorting-cell','sCellClassName'=>'ip','mSortingOrder'=>array('u.user_ip_register','s.session_ip_last'),'mLinkHtml'=>array($_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['user_ip_register'],$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['session_ip_last']),'sDropDownHtml'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['ip'],'sBaseUrl'=>$_smarty_tpl->tpl_vars['sFullPagePathToEvent']->value),$_smarty_tpl);?>


            <?php echo smarty_function_component(array('_default_short'=>'admin:table.sorting-cell','sCellClassName'=>'rating','mSortingOrder'=>array('u.user_rating'),'mLinkHtml'=>array($_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['user_rating']),'sDropDownHtml'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['rating_and_skill'],'sBaseUrl'=>$_smarty_tpl->tpl_vars['sFullPagePathToEvent']->value),$_smarty_tpl);?>


            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['session'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getSession(), null, 0);?>

            <tr>
                
                <td class="cell-user">
                    <div class="p-user-list-card">
                        <a href="<?php echo smarty_function_router(array('page'=>"admin/users/profile/".((string)$_smarty_tpl->tpl_vars['user']->value->getId())),$_smarty_tpl);?>
" class="cell-user-avatar <?php if ($_smarty_tpl->tpl_vars['user']->value->isOnline()){?>user-is-online<?php }?>">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->getProfileAvatarPath(48);?>
"
                                 alt="avatar"
                                 title="<?php if ($_smarty_tpl->tpl_vars['user']->value->isOnline()){?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_status_online'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_status_offline'];?>
<?php }?>" />
                        </a>

                        <div class="cell-user-login word-wrap">
                            <a href="<?php echo smarty_function_router(array('page'=>"admin/users/profile/".((string)$_smarty_tpl->tpl_vars['user']->value->getId())),$_smarty_tpl);?>
" class="link-border"
                               title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['login'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
</span></a>
                            <?php echo smarty_function_lang(array('name'=>"plugin.freelancer.user_role.".((string)$_smarty_tpl->tpl_vars['user']->value->getStrRole())),$_smarty_tpl);?>

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->isAdministrator()){?>
                                <i class="p-icon--user-admin" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['admin'];?>
"></i>
                            <?php }?>

                            <?php if (!isset($_smarty_tpl->tpl_vars['oBan'])) $_smarty_tpl->tpl_vars['oBan'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['oBan']->value = $_smarty_tpl->tpl_vars['user']->value->getBannedCached()){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['oBan']->value->getBanViewUrl();?>
"><i class="fa fa-lock" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['banned'];?>
"></i></a>
                            <?php }?>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['user']->value->getProfileName()){?>
                            <div class="cell-user-name" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['profile_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getProfileName();?>
</div>
                        <?php }?>

                        <div class="cell-user-mail" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getMail();?>
</div>
                        <?php $_smarty_tpl->tpl_vars['oInviter'] = new Smarty_variable($_smarty_tpl->tpl_vars['LS']->value->Invite_GetUserInviteFrom($_smarty_tpl->tpl_vars['user']->value->getId()), null, 0);?>
                        <div><span class="cell-user-mail">приглашен: </span>
                            <?php if ($_smarty_tpl->tpl_vars['oInviter']->value){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['oInviter']->value->getUserWebPath();?>
"><?php echo $_smarty_tpl->tpl_vars['oInviter']->value->getLogin();?>
</a>
                            <?php }else{ ?>
                                Пришел сам
                            <?php }?></div>
                    </div>
                </td>

                
                <td class="cell-birth">
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->getProfileBirthday()){?>
                        <?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['user']->value->getProfileBirthday(),'format'=>"j.m.Y",'notz'=>true),$_smarty_tpl);?>

                    <?php }else{ ?>
                        &mdash;
                    <?php }?>
                </td>

                
                <td class="cell-signup">
                    <div title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['reg'];?>
">
                        <?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['user']->value->getDateRegister(),'format'=>"d.m.Y"),$_smarty_tpl);?>
,
                        <span><?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['user']->value->getDateRegister(),'format'=>"H:i"),$_smarty_tpl);?>
</span>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value){?>
                        <div title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['last_visit'];?>
">
                            <?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['session']->value->getDateLast(),'format'=>"d.m.Y"),$_smarty_tpl);?>
,
                            <span><?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['session']->value->getDateLast(),'format'=>"H:i"),$_smarty_tpl);?>
</span>
                        </div>
                    <?php }?>
                </td>

                
                <td class="cell-ip">
                    <div title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['user_ip_register'];?>
">
                        <a href="<?php echo smarty_function_router(array('page'=>'admin/users/list'),$_smarty_tpl);?>
<?php echo smarty_function_request_filter(array('name'=>array('ip_register'),'value'=>array($_smarty_tpl->tpl_vars['user']->value->getIpRegister())),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getIpRegister();?>
</a>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value){?>
                        
                        <div title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['session_ip_last'];?>
">
                            <a href="<?php echo smarty_function_router(array('page'=>'admin/users/list'),$_smarty_tpl);?>
<?php echo smarty_function_request_filter(array('name'=>array('session_ip_last'),'value'=>array($_smarty_tpl->tpl_vars['session']->value->getIpLast())),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['profile']['info']['search_this_ip'];?>
"><?php echo $_smarty_tpl->tpl_vars['session']->value->getIpLast();?>
</a>
                        </div>
                    <?php }?>
                </td>

                
                <td class="cell-rating">
                    <div class="p-user-list-rating <?php if ($_smarty_tpl->tpl_vars['user']->value->getRating()<0){?>p-user-list-rating--negative<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users']['table_header']['user_rating'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['user']->value->getRating();?>

                    </div>
                </td>

                
                <td class="ls-table-cell-actions">
                    <?php echo smarty_function_component(array('_default_short'=>'admin:p-user.actions','user'=>$_smarty_tpl->tpl_vars['user']->value),$_smarty_tpl);?>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/ajax-on-page'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'admin:pagination.on-page','url'=>$_tmp1,'value'=>Config::Get('plugin.admin.users.per_page')),$_smarty_tpl);?>

<?php echo smarty_function_component(array('_default_short'=>'admin:pagination','total'=>+$_smarty_tpl->tpl_vars['pagination']->value['iCountPage'],'current'=>+$_smarty_tpl->tpl_vars['pagination']->value['iCurrentPage'],'url'=>((string)$_smarty_tpl->tpl_vars['pagination']->value['sBaseUrl'])."/page__page__/".((string)$_smarty_tpl->tpl_vars['pagination']->value['sGetParams'])),$_smarty_tpl);?>
<?php }} ?>