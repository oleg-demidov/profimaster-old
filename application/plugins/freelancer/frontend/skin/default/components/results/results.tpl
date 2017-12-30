{**
 * Страница поиска
 *
 *}
assa
{if $aAnkets['count']>0}
    <h3>Результаты поиска ({$aAnkets['count']})</h3>
     {foreach $aAnkets['collection'] as $oAnketa}
        {component 'results.anketa' anketa=$oAnketa}
     {/foreach}
     {component 'topic.list' topics=$oAnketa paging=$paging}
{else}
    <h3>Нет результатов</h3>
{/if}

