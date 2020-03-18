<?php

return [
    'nav' => 'Агенства',
    'page' => [
        'profile' => [
            'index' => [
                'title' => 'Мои агенства',
                'block' => [
                    'list' => [
                        'title' => 'Мои агенства',
                        'description' => [
                            'exist_agencies' => 'Здесь вы можете просмотреть список своих агенств, а также <a href="' . route('agency.create') . '">создать</a> новые.',
                            'not_exist_agencies' => 'У вас пока нет своих агенств, но вы можете <a href="' . route('agency.create') . '">создать</a> новые.',
                        ],
                        'link' => [
                            'create' => 'Создать агенство'
                        ]
                    ]
                ],
                'nav' => 'Кабинет агенства'
            ],
            'show' => [
                'block' => [
                    'agents' => [
                        'title' => 'Агенты',
                        'description' => [
                            'exist_agents' => 'Здесь вы можете просматривать список агентов :Name',
                            'not_exist_agents' => 'Здесь вы можете просматривать список агентов',
                        ]
                    ]
                ]
            ],
            'realty' => [
                'create' => [
                    'title' => 'Добавить недвижимость'
                ]
            ]
        ],
        'create' => [
            'block' => [
                'form' => [
                    'title' => 'Создать агенство',
                    'input' => [
                        'name' => [
                            'label' => 'Название',
                            'placeholder' => 'Название агенства',
                        ]
                    ],
                    'errors' => [
                        'name' => [
                            'required' => 'Необходимо указать название агенства',
                            'max' => 'Превишена максимальная длина названия',
                            'unique' => 'Агенство с таким названием уже зарегистрировано',
                        ]
                    ]
                ]
            ]
        ],
        'index' => [
            'title' => 'Список Агенств',
            'filter' => [
                'modal' => [
                    'title' => 'Фильтр агенств'
                ]
            ],
            'block' => [
                'agencies' => [
                    'title' => 'Список агенств',
                    'description' => 'Здесь вы можете порсмотреть список агенств',
                ],
                'order' => [
                    'modal' => [
                        'title' => 'Сортировка агенств'
                    ]
                ]
            ]
        ]
    ]
];
