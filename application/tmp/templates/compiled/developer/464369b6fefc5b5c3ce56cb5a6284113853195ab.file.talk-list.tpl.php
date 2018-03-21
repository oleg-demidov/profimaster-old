<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:36:34
         compiled from "/var/www/profimaster/application/frontend/components/talk/talk-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245628035ab100525b9bf3-34766233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '464369b6fefc5b5c3ce56cb5a6284113853195ab' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/talk/talk-list.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245628035ab100525b9bf3-34766233',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'talks' => 0,
    'selectable' => 0,
    'aLang' => 0,
    'select' => 0,
    'talk' => 0,
    'users' => 0,
    'author' => 0,
    'usersCount' => 0,
    'user' => 0,
    'oUserCurrent' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab10052612065_50730359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab10052612065_50730359')) {function content_5ab10052612065_50730359($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cfg')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cfg.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/profimaster/framework/libs/vendor/Smarty/libs/plugins/modifier.truncate.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('talks','selectable')),$_smarty_tpl);?>


<div class="js-talk-list">
    <?php if ($_smarty_tpl->tpl_vars['talks']->value){?>
        <form action="<?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
" method="post" id="talk-form">
            
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden.security-key'),$_smarty_tpl);?>

            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden','name'=>'form_action','id'=>'talk-form-action'),$_smarty_tpl);?>


            
            <?php if ($_smarty_tpl->tpl_vars['selectable']->value){?>
                <?php echo smarty_function_component(array('_default_short'=>'actionbar','template'=>'item.select','classes'=>'js-talk-actionbar-select','target'=>'.js-talk-list-item','assign'=>'select','items'=>array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['actionbar']['read'],'filter'=>":not('.talk-unread')"),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['actionbar']['unread'],'filter'=>".talk-unread"))),$_smarty_tpl);?>


                <?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>'talk-list-actionbar','items'=>array(array('buttons'=>array('html'=>$_smarty_tpl->tpl_vars['select']->value)),array('buttons'=>array(array('icon'=>'check','classes'=>'js-talk-form-button','attributes'=>array('data-action'=>'mark_as_read','title'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['actionbar']['mark_as_read']),'mods'=>'icon'),array('icon'=>'trash','classes'=>'js-talk-form-button','attributes'=>array('data-action'=>'remove','title'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['remove']),'mods'=>'icon'))))),$_smarty_tpl);?>

            <?php }?>

            
            <table class="ls-table talk-list">
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['talk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['talk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['talks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['talk']->key => $_smarty_tpl->tpl_vars['talk']->value){
$_smarty_tpl->tpl_vars['talk']->_loop = true;
?>
                        
                        <?php $_smarty_tpl->tpl_vars['author'] = new Smarty_variable($_smarty_tpl->tpl_vars['talk']->value->getTalkUser(), null, 0);?>

                        
                        <?php $_smarty_tpl->tpl_vars['users'] = new Smarty_variable($_smarty_tpl->tpl_vars['talk']->value->getTalkUsers(), null, 0);?>

                        
                        <?php $_smarty_tpl->tpl_vars['usersCount'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['users']->value), null, 0);?>

                        <tr class="talk-list-item <?php if ($_smarty_tpl->tpl_vars['author']->value->getCommentCountNew()||!$_smarty_tpl->tpl_vars['author']->value->getDateLast()){?>talk-unread<?php }?> js-talk-list-item" data-id="<?php echo $_smarty_tpl->tpl_vars['talk']->value->getId();?>
">
                            
                            <?php if ($_smarty_tpl->tpl_vars['selectable']->value){?>
                                <td class="cell-checkbox">
                                    <input type="checkbox" name="talk_select[<?php echo $_smarty_tpl->tpl_vars['talk']->value->getId();?>
]" data-id="<?php echo $_smarty_tpl->tpl_vars['talk']->value->getId();?>
" />
                                </td>
                            <?php }?>

                            
                            <td class="cell-favourite">
                                <?php echo smarty_function_component(array('_default_short'=>'favourite','classes'=>'js-favourite-talk','target'=>$_smarty_tpl->tpl_vars['talk']->value),$_smarty_tpl);?>

                            </td>

                            
                            <td class="cell-info">
                                <div class="talk-list-item-info">
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['usersCount']->value>2){?>
                                        <a href="<?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
read/<?php echo $_smarty_tpl->tpl_vars['talk']->value->getId();?>
/" class="talk-list-item-info-avatar">
                                            <img src="<?php echo smarty_function_cfg(array('name'=>'path.skin.web'),$_smarty_tpl);?>
/assets/images/avatars/avatar_male_64x64crop.png" />
                                        </a>

                                        <?php echo smarty_function_lang(array('name'=>'talk.participants','count'=>$_smarty_tpl->tpl_vars['usersCount']->value,'plural'=>true),$_smarty_tpl);?>

                                    <?php }else{ ?>
                                        
                                        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                                            <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getUser(), null, 0);?>

                                            <?php if ($_smarty_tpl->tpl_vars['user']->value->getUserId()!=$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()){?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value->getUserWebPath();?>
" class="talk-list-item-info-avatar">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->getProfileAvatarPath(64);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
" />
                                                </a>

                                                <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value->getUserWebPath();?>
" class="ls-word-wrap"><?php echo $_smarty_tpl->tpl_vars['user']->value->getDisplayName();?>
</a>
                                            <?php }?>
                                        <?php } ?>
                                    <?php }?>

                                    
                                    <time class="talk-list-item-info-date" datetime="<?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['talk']->value->getDate(),'format'=>'c'),$_smarty_tpl);?>
" title="<?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['talk']->value->getDate(),'format'=>'j F Y, H:i'),$_smarty_tpl);?>
">
                                        <?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['talk']->value->getDate(),'hours_back'=>"12",'minutes_back'=>"60",'now'=>"60",'day'=>"day H:i",'format'=>"j F Y, H:i"),$_smarty_tpl);?>

                                    </time>
                                </div>
                            </td>

                            
                            <td>
                                <div class="talk-list-item-extra">
                                    
                                    <h2 class="talk-list-item-title">
                                        <a href="<?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
read/<?php echo $_smarty_tpl->tpl_vars['talk']->value->getId();?>
/">
                                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['talk']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>

                                        </a>
                                    </h2>

                                    
                                    <div class="talk-list-item-text">
                                        <?php echo htmlspecialchars(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', ($_smarty_tpl->tpl_vars['talk']->value->getCommentLast() ? $_smarty_tpl->tpl_vars['talk']->value->getCommentLast()->getText() : $_smarty_tpl->tpl_vars['talk']->value->getText())),120,"..."), ENT_QUOTES, 'UTF-8', true);?>

                                    </div>

                                    
                                    <?php if ($_smarty_tpl->tpl_vars['talk']->value->getCountComment()){?>
                                        <div class="talk-list-item-count">
                                            <?php echo $_smarty_tpl->tpl_vars['talk']->value->getCountComment();?>


                                            <?php if ($_smarty_tpl->tpl_vars['author']->value->getCommentCountNew()){?>
                                                <strong>+<?php echo $_smarty_tpl->tpl_vars['author']->value->getCommentCountNew();?>
</strong>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'blankslate','text'=>$_smarty_tpl->tpl_vars['aLang']->value['talk']['notices']['empty']),$_smarty_tpl);?>

    <?php }?>

    <?php echo smarty_function_component(array('_default_short'=>'pagination','total'=>+$_smarty_tpl->tpl_vars['paging']->value['iCountPage'],'current'=>+$_smarty_tpl->tpl_vars['paging']->value['iCurrentPage'],'url'=>((string)$_smarty_tpl->tpl_vars['paging']->value['sBaseUrl'])."/page__page__/".((string)$_smarty_tpl->tpl_vars['paging']->value['sGetParams'])),$_smarty_tpl);?>

</div><?php }} ?>