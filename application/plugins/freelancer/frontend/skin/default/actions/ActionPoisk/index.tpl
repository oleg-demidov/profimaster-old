{**
 * Страница поиска
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    
    {show_blocks group='poisk' params=['user'=>1]}
    {block 'poisk'}
        {if !$paging['iPrevPage']}
            {hook run='ads_results' }
        {/if}
        {component 'results.results' aAnkets=$aAnkets}
        
    {/block}
    
{/block}
