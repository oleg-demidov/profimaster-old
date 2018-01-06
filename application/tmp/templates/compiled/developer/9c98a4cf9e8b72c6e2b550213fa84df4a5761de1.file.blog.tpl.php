<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 17:58:30
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/blog/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20557149815a462de6b5ba90-34096446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c98a4cf9e8b72c6e2b550213fa84df4a5761de1' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/blog/blog.tpl',
      1 => 1514540738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20557149815a462de6b5ba90-34096446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'blog' => 0,
    'blogs' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'aLang' => 0,
    'info' => 0,
    'isBlogAdmin' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a462de6b991c8_07427769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a462de6b991c8_07427769')) {function content_5a462de6b991c8_07427769($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('blog', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('blog','blogs','mods','classes','attributes')),$_smarty_tpl);?>



<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
    <?php echo smarty_function_component(array('_default_short'=>'blog','template'=>'modal.delete','blog'=>$_smarty_tpl->tpl_vars['blog']->value,'blogs'=>$_smarty_tpl->tpl_vars['blogs']->value),$_smarty_tpl);?>

<?php }?>


<?php $_smarty_tpl->tpl_vars['isBlogAdmin'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUserCurrent']->value&&($_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()==$_smarty_tpl->tpl_vars['blog']->value->getOwnerId()||$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()||$_smarty_tpl->tpl_vars['blog']->value->getUserIsAdministrator()), null, 0);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
 data-id="<?php echo $_smarty_tpl->tpl_vars['blog']->value->getId();?>
">
    <header class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-header">
        
        <h2 class="page-header blog-title">
            <?php if ($_smarty_tpl->tpl_vars['blog']->value->getType()=='close'){?>
                <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'blog.private'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'lock','attributes'=>array('title'=>$_tmp1)),$_smarty_tpl);?>

            <?php }?>

            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>

        </h2>
    </header>

    
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-content">
        
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-description ls-text">
            <?php echo $_smarty_tpl->tpl_vars['blog']->value->getDescription();?>

        </div>

        
        <?php ob_start();?><?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['blog']->value->getDateAdd(),'hours_back'=>'12','minutes_back'=>'60','now'=>'60','day'=>'day H:i','format'=>'j F Y'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['info'] = new Smarty_variable(array(array('label'=>$_smarty_tpl->tpl_vars['aLang']->value['blog']['date_created'],'content'=>$_tmp2),array('label'=>$_smarty_tpl->tpl_vars['aLang']->value['blog']['topics_total'],'content'=>$_smarty_tpl->tpl_vars['blog']->value->getCountTopic()),array('label'=>$_smarty_tpl->tpl_vars['aLang']->value['blog']['rating_limit'],'content'=>$_smarty_tpl->tpl_vars['blog']->value->getLimitRatingTopic())), null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['blog']->value->category->getCategory()){?>
            <?php $_smarty_tpl->createLocalArrayVariable('info', null, 0);
$_smarty_tpl->tpl_vars['info']->value[] = array('label'=>((string)$_smarty_tpl->tpl_vars['aLang']->value['blog']['categories']['category']).":",'content'=>$_smarty_tpl->tpl_vars['blog']->value->category->getCategory()->getTitle());?>
        <?php }?>

        <?php echo smarty_function_component(array('_default_short'=>'info-list','list'=>$_smarty_tpl->tpl_vars['info']->value),$_smarty_tpl);?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['isBlogAdmin']->value){?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'blog/edit'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'blog/delete'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>'createblog','mods'=>"compact",'items'=>array(array('buttons'=>array(array('url'=>$_tmp3.((string)$_smarty_tpl->tpl_vars['blog']->value->getId()),'text'=>'Редактировать','mods'=>'primary'))),array('buttons'=>array(array('url'=>$_tmp4.((string)$_smarty_tpl->tpl_vars['blog']->value->getId())."?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),'text'=>'Удалить','mods'=>'danger'))))),$_smarty_tpl);?>

    <?php }?>
</div><?php }} ?>