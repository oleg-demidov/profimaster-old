{**
 * Добавление о себе
 *
 *}
<h1>Статьи</h1>
{foreach $aPosts as $oPost}
    <a href="{router page="admin/plugin/freelancer/kbd/post"}{$oPost->_getDataOne('ID')}">{$oPost->getPostTitle()}</a><br>
{/foreach}