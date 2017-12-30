{**
 * Блок с аватаркой и именем пользователя
 *
 * @param object $user
 * @param string $classes
 * @param array  $attributes
 * @param array  $mods
 *}
{$component ="fl-avatar"}
{component_define_params params=[ 'user', 'size','classes','isName' => 1 ]}

{$sizes = [
    'xxlarge' => 500,
    'xlarge' => 300,
    'large' => 200,
    'default' => 100,
    'small' => 64,
    'xsmall' => 48,
    'xxsmall' => 24,
    'text' => 24
]}

{component 'avatar'
    image   = $user->getProfileAvatarPath( $sizes[ $size|default:'default' ] )
    url     = $user->getUserWebPath()
    classes = "{$classes}{$component}"
    name    = ($isName)?$user->getProfileName():''
    params  = $params}