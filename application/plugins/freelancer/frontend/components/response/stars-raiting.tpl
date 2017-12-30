{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-raiting-stars'}
{component_define_params params=[ 'count', 'selected']}
{$aItems = [["text"=>"Не выбрано", 'value'=>0]]}

{$aItems = []}
{for $x=1; $x<($count+1); $x++}
    {$aItems[]=[
         'text'=>$x,'value'=>$x
     ]} 
 {/for}
 {component 'field.select' 
     label="Ваша оценка"
     classes={$component}
     name="raiting" 
     items=$aItems 
     selectedValue=$selectedValue 
     label="Оценка"}
    
