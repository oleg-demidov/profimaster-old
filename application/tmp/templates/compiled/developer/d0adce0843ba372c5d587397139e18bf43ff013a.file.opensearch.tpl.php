<?php /* Smarty version Smarty-3.1.13, created on 2018-03-19 18:17:17
         compiled from "/var/www/profimaster/application/frontend/skin/developer/actions/ActionSearch/opensearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15254525625aafaa4d1b2d67-25660901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0adce0843ba372c5d587397139e18bf43ff013a' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/actions/ActionSearch/opensearch.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15254525625aafaa4d1b2d67-25660901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sHtmlTitle' => 0,
    'sHtmlDescription' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aafaa4d1bdbd7_33568224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aafaa4d1bdbd7_33568224')) {function content_5aafaa4d1bdbd7_33568224($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
    <ShortName><?php echo Config::Get('view.name');?>
</ShortName>
    <Description><?php echo $_smarty_tpl->tpl_vars['sHtmlTitle']->value;?>
</Description>
    <Contact><?php echo Config::Get('sys.mail.from_email');?>
</Contact>
    <Url type="text/html" template="<?php echo smarty_function_router(array('page'=>'search/topics'),$_smarty_tpl);?>
?q={searchTerms}" />
    <LongName><?php echo $_smarty_tpl->tpl_vars['sHtmlDescription']->value;?>
</LongName>
    <Image height="64" width="64" type="image/png"><?php echo Config::Get('path.skin.assets.web');?>
/images/favicons/opensearch.png</Image>
    <Image height="16" width="16" type="image/vnd.microsoft.icon"><?php echo Config::Get('path.skin.assets.web');?>
/images/favicons/favicon.ico</Image>
    <Developer><?php echo Config::Get('view.name');?>
 (<?php echo Router::GetPath('/');?>
)</Developer>
    <Attribution>
        © «<?php echo Config::Get('view.name');?>
»
    </Attribution>
    <SyndicationRight>open</SyndicationRight>
    <AdultContent>false</AdultContent>
    <Language>ru-ru</Language>
    <OutputEncoding>UTF-8</OutputEncoding>
    <InputEncoding>UTF-8</InputEncoding>
</OpenSearchDescription><?php }} ?>