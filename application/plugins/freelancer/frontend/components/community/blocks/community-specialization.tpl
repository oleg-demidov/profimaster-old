
{$component = 'fl-comm-specialization'}

{$aItems = []}
{foreach $aBranchs as $oBranch}
    {$aItems[] = [ 'text' => {$oBranch->getTitle()}, 'value' => {$oBranch->getId()},'icon' => $oBranch->_getIcon() ]}
{/foreach}

{component 'block' 
    title="Ветка"
    classes=$component
    content={component 'freelancer:dropdown-select' 
                mods='large' 
                classes="js-community-specialization" 
                aItems=$aItems 
                selectedItem=$selectedBranch}
}
