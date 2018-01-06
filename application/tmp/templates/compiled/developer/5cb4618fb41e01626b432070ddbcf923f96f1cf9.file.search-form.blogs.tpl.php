<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:15:46
         compiled from "/var/www/profimaster/application/frontend/components/blog/search-form.blogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11912284495a4631f2106475-19263561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cb4618fb41e01626b432070ddbcf923f96f1cf9' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/search-form.blogs.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11912284495a4631f2106475-19263561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4631f2109504_96707032',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4631f2109504_96707032')) {function content_5a4631f2109504_96707032($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component(array('_default_short'=>'search-form','name'=>'blog','method'=>'post','placeholder'=>$_smarty_tpl->tpl_vars['aLang']->value['blog']['search']['placeholder'],'inputClasses'=>'js-search-text-main','inputName'=>'blog_title','noSubmitButton'=>true),$_smarty_tpl);?>
<?php }} ?>