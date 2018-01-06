<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 16:19:24
         compiled from "/var/www/profimaster/framework/frontend/components/editor/editor.markup.help.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13999908665a4616ac9bd4e8-88654310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38b77b50bb0bd67d66a0ea9990c156d69d308239' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/editor/editor.markup.help.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13999908665a4616ac9bd4e8-88654310',
  'function' => 
  array (
    'editor_help_item' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'items' => 0,
    'component' => 0,
    'item' => 0,
    'tag' => 0,
    'targetId' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4616aca08787_92695489',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4616aca08787_92695489')) {function content_5a4616aca08787_92695489($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('editor-help', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('targetId')),$_smarty_tpl);?>


<?php if (!function_exists('smarty_template_function_editor_help_item')) {
    function smarty_template_function_editor_help_item($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['editor_help_item']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?><dl class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-item"><?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?><dt><a href="#" class="ls-link-dotted js-tags-help-link" <?php if ($_smarty_tpl->tpl_vars['tag']->value['insert']){?>data-insert="<?php echo $_smarty_tpl->tpl_vars['tag']->value['insert'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
</a></dt><?php } ?><dd><?php echo $_smarty_tpl->tpl_vars['item']->value['def'];?>
</dd></dl><?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 js-editor-help" data-form-id="<?php echo $_smarty_tpl->tpl_vars['targetId']->value;?>
">
    <header class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-header ls-clearfix">
        <a href="#" class="ls-link-dotted help-link js-editor-help-toggle"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['link_show'];?>
</a>
    </header>

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-body js-editor-help-body">
        <h3 class="h3"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special'];?>
</h3>

        <div class="ls-mb-30">
            <?php smarty_template_function_editor_help_item($_smarty_tpl,array('items'=>array(array('tags'=>array(array('text'=>'&lt;cut&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_cut']),array('tags'=>array(array('text'=>"&lt;cut name=\"".((string)$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_cut_name_example_name'])."\"&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_cut_name']),array('tags'=>array(array('text'=>"&lt;video&gt;http://...&lt;/video&gt;",'insert'=>'&lt;video&gt;&lt;/video&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_video']),array('tags'=>array(array('text'=>"&lt;ls user=\"".((string)$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_ls_user_example_user'])."\" /&gt;",'insert'=>'&lt;ls user=&quot;&quot; /&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['special_ls_user']))));?>

        </div>

        <h3 class="h3"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart'];?>
</h3>

        <div class="ls-clearfix">
            <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-col">
                <?php smarty_template_function_editor_help_item($_smarty_tpl,array('items'=>array(array('tags'=>array(array('text'=>'&lt;h4&gt;&lt;/h4&gt;'),array('text'=>'&lt;h5&gt;&lt;/h5&gt;'),array('text'=>'&lt;h6&gt;&lt;/h6&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_h']),array('tags'=>array(array('text'=>"&lt;img src=\"\" /&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_img']),array('tags'=>array(array('text'=>"&lt;a href=\"http://...\"&gt;".((string)$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_a_example_href'])."&lt;/a&gt;",'insert'=>'&lt;a href=&quot;&quot;&gt;&lt;/a&gt;"')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_a']),array('tags'=>array(array('text'=>"&lt;b&gt;&lt;/b&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_b']),array('tags'=>array(array('text'=>"&lt;i&gt;&lt;/i&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_i']),array('tags'=>array(array('text'=>"&lt;s&gt;&lt;/s&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_s']),array('tags'=>array(array('text'=>"&lt;u&gt;&lt;/u&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_u']))));?>

            </ul>

            <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-col">
                <?php smarty_template_function_editor_help_item($_smarty_tpl,array('items'=>array(array('tags'=>array(array('text'=>"&lt;hr /&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_hr']),array('tags'=>array(array('text'=>"&lt;blockquote&gt;&lt;/blockquote&gt;")),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_blockquote']),array('tags'=>array(array('text'=>'&lt;table>&lt;/table&gt;'),array('text'=>'&lt;th>&lt;/th&gt;'),array('text'=>'&lt;td>&lt;/td&gt;'),array('text'=>'&lt;tr>&lt;/tr&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_table']),array('tags'=>array(array('text'=>'&lt;ul&gt;&lt;/ul&gt;'),array('text'=>'&lt;li&gt;&lt;/li&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_ul']),array('tags'=>array(array('text'=>'&lt;ol&gt;&lt;/ol&gt;'),array('text'=>'&lt;li&gt;&lt;/li&gt;')),'def'=>$_smarty_tpl->tpl_vars['aLang']->value['editor']['markup']['help']['standart_ol']))));?>

            </ul>
        </div>
    </div>
</div>
<?php }} ?>