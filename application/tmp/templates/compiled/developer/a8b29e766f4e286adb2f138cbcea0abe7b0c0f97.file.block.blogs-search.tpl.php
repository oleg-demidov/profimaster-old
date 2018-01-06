<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:15:45
         compiled from "/var/www/profimaster/application/frontend/components/blog/blocks/block.blogs-search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16826659225a4631f1db6d18-20438424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8b29e766f4e286adb2f138cbcea0abe7b0c0f97' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/blog/blocks/block.blogs-search.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16826659225a4631f1db6d18-20438424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aBlogCategories' => 0,
    'iCountBlogsAll' => 0,
    'category' => 0,
    'oCategory' => 0,
    'items' => 0,
    'aLang' => 0,
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4631f1de6950_31616237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4631f1de6950_31616237')) {function content_5a4631f1de6950_31616237($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
    <h3><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.search.categories.title'),$_smarty_tpl);?>
</h3>

    
    <?php if ($_smarty_tpl->tpl_vars['aBlogCategories']->value){?>
        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.search.categories.all'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'blogs'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable(array(array('name'=>'all','text'=>$_tmp1,'url'=>$_tmp2,'attributes'=>array('data-value'=>'0'),'count'=>$_smarty_tpl->tpl_vars['iCountBlogsAll']->value)), null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBlogCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['oCategory'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value['entity'], null, 0);?>

            <?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>($_smarty_tpl->tpl_vars['oCategory']->value->getTitle()),'url'=>'#','attributes'=>array('data-value'=>$_smarty_tpl->tpl_vars['oCategory']->value->getId(),'style'=>"margin-left: ".((string)($_smarty_tpl->tpl_vars['category']->value['level']*20))."px;"),'count'=>$_smarty_tpl->tpl_vars['oCategory']->value->getCountTargetOfDescendants());?>
        <?php } ?>

        <?php echo smarty_function_component(array('_default_short'=>'nav','name'=>'blogs_categories','classes'=>'actionbar-item-link','attributes'=>array('id'=>'js-search-ajax-blog-category'),'activeItem'=>'all','mods'=>'stacked pills','items'=>$_smarty_tpl->tpl_vars['items']->value),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'blankslate','text'=>$_smarty_tpl->tpl_vars['aLang']->value['blog']['categories']['empty']),$_smarty_tpl);?>

    <?php }?>

    <br>

    
    <h3><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.search.type.title'),$_smarty_tpl);?>
</h3>

    <div class="ls-field-checkbox-group">
        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.type.any'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-type','name'=>'blog_search_type','value'=>'','label'=>$_tmp3,'checked'=>true),$_smarty_tpl);?>

        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.type.public'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-type','name'=>'blog_search_type','value'=>'open','label'=>$_tmp4),$_smarty_tpl);?>

        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.type.private'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-type','name'=>'blog_search_type','value'=>'close','label'=>$_tmp5),$_smarty_tpl);?>

    </div>

    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
        <h3><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.search.relation.title'),$_smarty_tpl);?>
</h3>

        <div class="ls-field-checkbox-group">
            <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.relation.all'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-relation','name'=>'blog_search_relation','value'=>'all','label'=>$_tmp6,'checked'=>true),$_smarty_tpl);?>

            <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.relation.my'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-relation','name'=>'blog_search_relation','value'=>'my','label'=>$_tmp7),$_smarty_tpl);?>

            <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.search.form.relation.joined'),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'radio','inputClasses'=>'js-search-ajax-blog-relation','name'=>'blog_search_relation','value'=>'join','label'=>$_tmp8),$_smarty_tpl);?>

        </div>
    <?php }?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.blocks.search.title'),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'blogs-search','title'=>$_tmp9,'content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>
<?php }} ?>