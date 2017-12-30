
{component_define_params params=[ 'oUser']}
{* Управление медиа-файлами *}
{component 'media'
  sMediaTargetType = 'user'
  sMediaTargetId   = $oUser->getId()
  classes          = "user-media-mymodal"
  id               = "media_modal_user"
 }
 