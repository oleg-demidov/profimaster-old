{**
 * Форма добавления/редактирования категории
 *}
{if $oCategoryType->getTargetType() == Config::Get('plugin.ydirect.category_type')}
    {if $oCampaign}
        {$iActive = $oCampaign->getActive()}
        {$iId = $oCategory->getId()}
    {/if}
    {component 'field.checkbox' name="active" checked=$iActive label="активировать кампанию"}
    {component 'field.hidden' name="category_id" value=$iId}
    {if $oCategory}
        {$sKeywords = $oCampaign->getNegativeKeywords()}
    {else}
        {$sKeywords = ''}    
    {/if}
    {component 'admin:field' template='textarea' name='negative_keywords'  label='Минус Ключевые слова(Через запятую)' value={$sKeywords}}
    
{/if}