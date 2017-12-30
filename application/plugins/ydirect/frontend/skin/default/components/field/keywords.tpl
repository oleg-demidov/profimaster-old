{component_define_params params=[ 'name', 'aKeyword' , 'classes' ]}
{$sKeywords = ''}
{foreach $aKeyword as $oKeyword}
    {$sKeywords = $sKeywords|cat:$oKeyword->getValue()}
    {$sKeywords = $sKeywords|cat:', '}
{/foreach}
{component "field.text" value={$sKeywords} name="{$name}[keywords]" label="Ключевые слова"}