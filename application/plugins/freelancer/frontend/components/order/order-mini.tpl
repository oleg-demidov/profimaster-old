{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'freelancer-order-mini'}
{component_define_params params=[ 'oOrder', 'mods' ]}

{$oMedia = $oOrder->media->getMediaOne()}
{if $oMedia}
    {$Image = ['path' => $oMedia->getFileWebPath('100x100crop')]}
{/if}


{component 'item'
    classes={$component}
    title=$oOrder->getTitle()
    titleUrl=$oOrder->_getUrlView()
    desc={component 'text' text=$oOrder->getCropText()}
    image=$Image}