<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:28:40
         compiled from "/var/www/profimaster/application/frontend/components/activity/blocks/recent-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16730046755a4634f8344554-41282236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cd4eb2510b247c6148f204646a6dee2e37f562b' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/activity/blocks/recent-item.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16730046755a4634f8344554-41282236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'topic' => 0,
    'date' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4634f8358034_26269956',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4634f8358034_26269956')) {function content_5a4634f8358034_26269956($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?><?php echo smarty_function_component_define_params(array('params'=>array('user','topic','date')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('item_content', null, null); ob_start(); ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value->getUserWebPath();?>
" class="ls-activity-block-recent-user"><?php echo $_smarty_tpl->tpl_vars['user']->value->getDisplayName();?>
</a> &rarr;
    <a href="<?php echo $_smarty_tpl->tpl_vars['topic']->value->getUrl();?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['topic']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</a>

    <p class="ls-activity-block-recent-info">
        <time datetime="<?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'format'=>'c'),$_smarty_tpl);?>
" class="ls-activity-block-recent-time">
            <?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'hours_back'=>"12",'minutes_back'=>"60",'now'=>"60",'day'=>"day H:i",'format'=>"j F Y"),$_smarty_tpl);?>

        </time>

        <a href="<?php echo $_smarty_tpl->tpl_vars['topic']->value->getUrl();?>
#comments" class="ls-activity-block-recent-comments">
            <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'comments'),$_smarty_tpl);?>

            <?php echo smarty_function_lang(array('_default_short'=>'comments.comments_declension','count'=>$_smarty_tpl->tpl_vars['topic']->value->getCountComment(),'plural'=>true),$_smarty_tpl);?>

        </a>
    </p>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'item','element'=>'li','mods'=>'image-rounded','desc'=>Smarty::$_smarty_vars['capture']['item_content'],'image'=>array('path'=>$_smarty_tpl->tpl_vars['user']->value->getProfileAvatarPath(48),'url'=>$_smarty_tpl->tpl_vars['user']->value->getUserWebPath()),'params'=>$_smarty_tpl->tpl_vars['params']->value),$_smarty_tpl);?>
<?php }} ?>