

{$component = 'fl-invite-but'}
{component_define_params params=[ 'oUser']}

{capture 'content'}
    
    {component 'info-list' mods="large long" list=[
        [ 'label' => "Ссылка для приглашения :", 'icon'=> 'link',
            'content' => "<b><a href='{router page='r'}{$oUser->getId()}'>{Router::GetPathRootWeb(false)}/r/{$oUser->getId()}</a></b>" ]
    ]}
    
    {component 'freelancer:yshare' 
        label="Поделиться ссылкой в соц сетях"
        image="{Plugin::GetTemplateWebPath('freelancer')}assets/images/logo500.png"
        url="{router page='r'}{$oUserCurrent->getId()}"
        title="Profimaster.kz - мастера Казахстана"
        description="Новая доска объявлений для мастеров Казахстана. Мы быстро развиваемся. Присоединяйтесь к нашему сообществу."
        services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj,viber,whatsapp,skype,telegram"}
    
    
{/capture}
{component 'block' content=$smarty.capture.content}