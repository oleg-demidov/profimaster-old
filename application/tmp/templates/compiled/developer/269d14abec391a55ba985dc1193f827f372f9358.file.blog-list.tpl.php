<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:15:46
         compiled from "/var/www/profimaster/application/frontend/components/blog/list/blog-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8298095425a4631f2228252-40772937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '269d14abec391a55ba985dc1193f827f372f9358' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/list/blog-list.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8298095425a4631f2228252-40772937',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blogs' => 0,
    'useMore' => 0,
    'hideMore' => 0,
    'pagination' => 0,
    'textEmpty' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4631f2238d99_52652957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4631f2238d99_52652957')) {function content_5a4631f2238d99_52652957($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('blogs','pagination','useMore','hideMore','textEmpty')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['blogs']->value){?>
    
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'blog','template'=>'list-loop','blogs'=>$_smarty_tpl->tpl_vars['blogs']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'item','template'=>'group','classes'=>'js-more-blogs-container','items'=>$_tmp1),$_smarty_tpl);?>


    
    <?php if ($_smarty_tpl->tpl_vars['useMore']->value){?>
        <?php if (!$_smarty_tpl->tpl_vars['hideMore']->value){?>
            <?php echo smarty_function_component(array('_default_short'=>'more','classes'=>'js-more-search','target'=>'.js-more-blogs-container','ajaxParams'=>array('next_page'=>2)),$_smarty_tpl);?>

        <?php }?>
    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'pagination','total'=>+$_smarty_tpl->tpl_vars['pagination']->value['iCountPage'],'current'=>+$_smarty_tpl->tpl_vars['pagination']->value['iCurrentPage'],'url'=>((string)$_smarty_tpl->tpl_vars['pagination']->value['sBaseUrl'])."/page__page__/".((string)$_smarty_tpl->tpl_vars['pagination']->value['sGetParams'])),$_smarty_tpl);?>

    <?php }?>
<?php }else{ ?>
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'blog.alerts.empty'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'blankslate','text'=>(($tmp = @$_smarty_tpl->tpl_vars['textEmpty']->value)===null||$tmp==='' ? $_tmp2 : $tmp)),$_smarty_tpl);?>

<?php }?><?php }} ?>