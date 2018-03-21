<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 19:44:59
         compiled from "/var/www/profimaster/application/frontend/skin/developer/emails/email.reactivation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18782683515aa9275bc2a619-29195127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7db0fbbf7efe3d26d20658f66d8d01332f8dad82' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/emails/email.reactivation.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
    '6a2fa71ac07589f3ddfd07441893da2f77884d0c' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/email/email.tpl',
      1 => 1506569547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18782683515aa9275bc2a619-29195127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LS' => 0,
    'backgroundColor' => 0,
    'containerBorderColor' => 0,
    'headerBackgroundColor' => 0,
    'headerTitleColor' => 0,
    'imagesDir' => 0,
    'headerDescriptionColor' => 0,
    'contentBackgroundColor' => 0,
    'contentTextColor' => 0,
    'sTitle' => 0,
    'contentTitleColor' => 0,
    'title' => 0,
    'content' => 0,
    'aLang' => 0,
    'footerBackgroundColor' => 0,
    'footerTextColor' => 0,
    'footerLinkColor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa9275bc663e4_32551778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa9275bc663e4_32551778')) {function content_5aa9275bc663e4_32551778($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->tpl_vars['backgroundColor'] = new Smarty_variable('F4F4F4', null, 0);?>           

<?php $_smarty_tpl->tpl_vars['containerBorderColor'] = new Smarty_variable('D0D6E8', null, 0);?>      

<?php $_smarty_tpl->tpl_vars['headerBackgroundColor'] = new Smarty_variable('5C7DC4', null, 0);?>     
<?php $_smarty_tpl->tpl_vars['headerTitleColor'] = new Smarty_variable('FFFFFF', null, 0);?>          
<?php $_smarty_tpl->tpl_vars['headerDescriptionColor'] = new Smarty_variable('B8C5E1', null, 0);?>    

<?php $_smarty_tpl->tpl_vars['contentBackgroundColor'] = new Smarty_variable('FFFFFF', null, 0);?>    
<?php $_smarty_tpl->tpl_vars['contentTitleColor'] = new Smarty_variable('000000', null, 0);?>         
<?php $_smarty_tpl->tpl_vars['contentTextColor'] = new Smarty_variable('4f4f4f', null, 0);?>          

<?php $_smarty_tpl->tpl_vars['footerBackgroundColor'] = new Smarty_variable('fafafa', null, 0);?>     
<?php $_smarty_tpl->tpl_vars['footerTextColor'] = new Smarty_variable('949fa3', null, 0);?>           
<?php $_smarty_tpl->tpl_vars['footerLinkColor'] = new Smarty_variable('949fa3', null, 0);?>           


<?php $_smarty_tpl->tpl_vars['imagesDir'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['LS']->value->Component_GetWebPath('email'))."/images", null, 0);?>

<?php echo smarty_function_component_define_params(array('params'=>array('title','content')),$_smarty_tpl);?>



<table width="100%" align="center" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['backgroundColor']->value;?>
" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
    <tr><td>
        <br />
        <br />

        
        <table width="573" align="center" cellpadding="0" cellspacing="0" style="border-collapse: collapse; font: normal 13px/1.4em Verdana, Arial; color: #4f4f4f; border: 1px solid #<?php echo $_smarty_tpl->tpl_vars['containerBorderColor']->value;?>
;">
            
            <tr>
                <td>
                    <table width="100%" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['headerBackgroundColor']->value;?>
" cellpadding="50" cellspacing="0" style="border-collapse: collapse;">
                        <tr>
                            <td style="font-size: 11px; line-height: 1em;">
                                <span style="font: normal 29px Arial, sans-serif; line-height: 1em; color: #<?php echo $_smarty_tpl->tpl_vars['headerTitleColor']->value;?>
"><strong><?php echo Config::Get('view.name');?>
</strong></span>
                                <div style="line-height: 0; height: 10px;"><img src="<?php echo $_smarty_tpl->tpl_vars['imagesDir']->value;?>
/blank.gif" width="10" height="10"/></div>
                                <span style="color: #<?php echo $_smarty_tpl->tpl_vars['headerDescriptionColor']->value;?>
"><?php echo Config::Get('view.description');?>
</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            
            <tr>
                <td>
                    <table width="100%" cellpadding="50" cellspacing="0" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['contentBackgroundColor']->value;?>
" style="border-collapse: collapse;">
                        <tr>
                            <td valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; font: normal 13px/1.4em Verdana, Arial; color: #<?php echo $_smarty_tpl->tpl_vars['contentTextColor']->value;?>
;">
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['sTitle']->value){?>
                                        <tr>
                                            <td valign="top">
                                                <span style="font: normal 19px Arial; line-height: 1.3em; color: #<?php echo $_smarty_tpl->tpl_vars['contentTitleColor']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                                            </td>
                                        </tr>
                                        <tr><td height="10"><div style="line-height: 0;"><img src="<?php echo $_smarty_tpl->tpl_vars['imagesDir']->value;?>
/blank.gif" width="15" height="15"/></div></td></tr>
                                    <?php }?>

                                    
                                    <tr>
                                        <td valign="top">
                                            
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_lang(array('name'=>'emails.reactivation.text','params'=>array('website_url'=>Router::GetPath('/'),'website_name'=>Config::Get('view.name'),'activation_url'=>$_tmp1."activate/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getActivateKey())."/")),$_smarty_tpl);?>


                                            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                            <br>
                                            <br>
                                            <?php echo $_smarty_tpl->tpl_vars['aLang']->value['emails']['common']['regards'];?>
 <a href="<?php echo Router::GetPath('/');?>
"><?php echo Config::Get('view.name');?>
</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    
                    <table width="100%" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['footerBackgroundColor']->value;?>
" cellpadding="20" cellspacing="0" style="border-collapse: collapse; font: normal 11px Verdana, Arial; line-height: 1.3em; color: #<?php echo $_smarty_tpl->tpl_vars['footerTextColor']->value;?>
;">
                        <tr>
                            <td valign="center">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['imagesDir']->value;?>
/blank.gif" width="27" height="10" style="vertical-align: middle">
                                <a href="<?php echo Router::GetPath('/');?>
" style="color: #<?php echo $_smarty_tpl->tpl_vars['footerLinkColor']->value;?>
 !important;"><?php echo Config::Get('view.name');?>
</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br />
        <br />
    </td></tr>
</table><?php }} ?>