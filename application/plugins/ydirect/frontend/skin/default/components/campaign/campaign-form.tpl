{**
 * Форма добавления/редактирования категории
 *}
{$component = 'ydirect-campagn-form'}
{component_define_params params=[ 'oCampaign']}

{capture 'campaign_form'}
    {if $oCampaign}
        {$sKeywords = $oCampaign->getNegativeKeywords()}
        {$isActive = $oCampaign->getActive()}
        {$aKeywords = $oCampaign->getKeywords()}
        {$sNKeywords = $oCampaign->getNegativeKeywords()}
    {/if}
    {$sKeywords = ''}
    {foreach $aKeywords as $oKeyword}
        {$sKeywords = $sKeywords|cat:$oKeyword->getValue()}
        {$sKeywords = $sKeywords|cat:', '}
    {/foreach}
    
    {component 'field.checkbox' classes="js-checkbox-on-campaign" name="campaign_active" checked=$isActive label="Активировать кампанию"}
    {component "field.text" value={$sKeywords} name="campaign_keywords" label="Ключевые слова"}   
    {component 'field' template='text' name='campaign_negative_keywords'  label='Минус Ключевые слова(Через запятую)' value={$sNKeywords}}
{/capture}
<script>
    /*document.addEventListener("DOMContentLoaded", function(){ 
        //console.log($('js-checkbox-on-campaign'))
               
    });*/
</script>
{component 'block' title="Настройки Ydirect" content=$smarty.capture.campaign_form}
