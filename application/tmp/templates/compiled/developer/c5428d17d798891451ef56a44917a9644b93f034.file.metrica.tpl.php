<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/ydirect/frontend/components/metrica/metrica.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1197131535a4e49ebd20044-45643611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5428d17d798891451ef56a44917a9644b93f034' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ydirect/frontend/components/metrica/metrica.tpl',
      1 => 1512576528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1197131535a4e49ebd20044-45643611',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ebd24744_24931612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ebd24744_24931612')) {function content_5a4e49ebd24744_24931612($_smarty_tpl) {?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?php echo Config::Get('plugin.ydirect.id_metrica');?>
 = new Ya.Metrika({
                    id:<?php echo Config::Get('plugin.ydirect.id_metrica');?>
,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?php echo Config::Get('plugin.ydirect.id_metrica');?>
" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php }} ?>