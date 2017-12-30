    {component 'block' classes="role-buttons" title="Выберете вашу роль"
    content={component 'button' template='group' label="Выберете вашу роль" buttons=[
        [ 'text' => 'Мастер', 
            'mods' => "primary",
            'classes' => 'master-but',
            'type' => 'button',
            'value' => 'master'],
        [ 'text' => 'Заказчик', 
            'mods' => "",
            'classes' => 'employer-but',
            'type' => 'button',
            'value' => 'employer']
        
    ]}}
