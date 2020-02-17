<?php

return [
    'page' => [
        'profile' => [
            'nav' => 'Кабинет агента',
            'show' => [
                'block' => [
                    'register' => [
                        'description' => 'Вы пока не являетесь Агентом ни одного Агенства, но можете <a href="' . route('agent.create') . '">им стать</a>'
                    ]
                ]
            ]
        ],
        'create' => [
            'title' => 'Страница создания агента',
            'form' => [
                'title' => 'Создать агента',
                'input' => [
                    'agency' => [
                        'label' => 'Выбрать агенство:'
                    ]
                ],
                'errors' => [
                    'agency_id' => [
                        'required' => 'Необходимо выбрать агенство',
                    ],
                    'user_id' => [
                        'unique' => 'Данный агент уже зарегистрирован'
                    ]
                ]
            ]
        ],
        'index' => [
            'title' => 'Список агентов'
        ]
    ]
];
