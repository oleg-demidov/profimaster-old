{**
 * Вывод категорий на странице создания нового объекта
 *}

{extends 'component@tabs'}

{block 'tabs_options'}
    {component_define_params params=[ 'categories', 'categoriesSelected', 'name']}
    {$classes= "{$classes} fl-category-tabs checkboxes"}
    
    {$tabs=[]}
    
    {foreach $categories as $categoryLevel0}
        
        {$aData = $categoryLevel0->getData()}        
        {$tab.text =  "{component 'icon' mods='large' icon={$aData['icon']}} {$categoryLevel0->getTitle()}" }
        
        {$categoriesLevel1 = $categoryLevel0->getChildren()}
        
        {capture name="content_tab"}
            {foreach $categoriesLevel1 as $categoryLevel1}
                {strip}
                    <div class="fl-category-tabs-block">
                    {component 'field.checkbox' 
                        classes = "parent-item"
                        attributes = ['data-id' => $categoryLevel1->getId(), 'data-parent-id' => $categoryLevel0->getId()]
                        label=$categoryLevel1->getTitle() 
                        value=0}

                    {$categoriesLevel2 = $categoryLevel1->getChildren()}

                    {foreach $categoriesLevel2 as $categoryLevel2}
                        {$count = ''}
                        {if $categoryLevel2->getCountTarget()}
                            {$count = {component 'badge' mods='warning' value=$categoryLevel2->getCountTarget()}}
                        {/if}
                        {component 'field.checkbox' 
                            name="{$name|default:'categories'}[]"
                            classes = "child-item"
                            attributes = ['data-parent-id' => $categoryLevel1->getId()]
                            label="{$categoryLevel2->getTitle()} {$count}" 
                            value=$categoryLevel2->getId()}
                    {/foreach}
                    </div>
                {/strip}
            {/foreach}
            
        {/capture}
        
        {$tab.content =  $smarty.capture.content_tab }
        
        {$tabs[]=$tab}
    {/foreach} 
    
    
{/block}