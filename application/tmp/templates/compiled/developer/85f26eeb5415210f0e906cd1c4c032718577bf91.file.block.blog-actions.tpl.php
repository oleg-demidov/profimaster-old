<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18739300795a462de69c6192-82761493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85f26eeb5415210f0e906cd1c4c032718577bf91' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/blocks/block.blog-actions.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18739300795a462de69c6192-82761493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'blog' => 0,
    'LS' => 0,
    'topicType' => 0,
    'aLang' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
    'actions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de69fd657_04601083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de69fd657_04601083')) {function content_5a462de69fd657_04601083($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
    
    <?php $_smarty_tpl->tpl_vars['actions'] = new Smarty_variable(array(), null, 0);?>

    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()!=$_smarty_tpl->tpl_vars['blog']->value->getOwnerId()&&$_smarty_tpl->tpl_vars['blog']->value->getType()=='open'){?>
        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.actions.leave'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.actions.join'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['blog']->value->getUserIsJoin() ? $_tmp1 : $_tmp2;?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('classes'=>'js-blog-profile-join','attributes'=>array('data-blog-id'=>$_smarty_tpl->tpl_vars['blog']->value->getId()),'text'=>$_tmp3);?>
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&(($_smarty_tpl->tpl_vars['blog']->value->getUserIsJoin()&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->getRating()>=$_smarty_tpl->tpl_vars['blog']->value->getLimitRatingTopic())||$_smarty_tpl->tpl_vars['blog']->value->isAllowEdit())){?>
        <?php $_smarty_tpl->tpl_vars['topicType'] = new Smarty_variable($_smarty_tpl->tpl_vars['LS']->value->Topic_GetTopicTypeFirst(), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['topicType']->value){?>
            <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.actions.write'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('url'=>((string)$_smarty_tpl->tpl_vars['topicType']->value->getUrlForAdd())."?blog_id=".((string)$_smarty_tpl->tpl_vars['blog']->value->getId()),'text'=>$_tmp4);?>
        <?php }?>
    <?php }?>

    
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'rss'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.actions.rss'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('url'=>$_tmp5."blog/".((string)$_smarty_tpl->tpl_vars['blog']->value->getUrl())."/",'text'=>$_tmp6);?>

    <?php if ($_smarty_tpl->tpl_vars['blog']->value->isAllowEdit()){?>
        
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'blog'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('url'=>$_tmp7."edit/".((string)$_smarty_tpl->tpl_vars['blog']->value->getId())."/",'text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['edit']);?>

        
        <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
            <?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('classes'=>'js-modal-toggle-default','attributes'=>array('data-lsmodaltoggle-modal'=>'modal-blog-delete'),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['remove']);?>
        <?php }else{ ?>
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'blog'),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('actions', null, 0);
$_smarty_tpl->tpl_vars['actions']->value[] = array('url'=>$_tmp8."delete/".((string)$_smarty_tpl->tpl_vars['blog']->value->getId())."/?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),'classes'=>'js-confirm-remove-default','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['remove']);?>
        <?php }?>
    <?php }?>

    <?php echo smarty_function_component(array('_default_short'=>'nav','hook'=>'blog_actions','items'=>$_smarty_tpl->tpl_vars['actions']->value,'mods'=>'stacked','classes'=>'profile-actions'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'nopadding transparent user-actions','content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>
<?php }} ?>