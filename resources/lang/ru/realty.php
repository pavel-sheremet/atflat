<?php

return [
    'nav' => 'Недвижимость',
    'rooms_number' => '{0} Студия|[1,7] :value|[8,*] :value и более',
    'create' => [
        'input' => [
            'address' => [
                'label' => [
                    'type_or_click' => 'Введите адрес или выберите на карте'
                ]
            ],
            'type' => [
                'label' => 'Тип недвижимости'
            ],
            'rooms_number' => [
                'label' => 'Количество комнат'
            ],
            'price' => [
                'label' => 'Арендная плата'
            ],
            'sub_price' => [
                'label' => 'Залог'
            ],
            'description' => [
                'label' => 'Описание'
            ],
            'area' => [
                'unit' => 'м',
                'label' => 'Площадь',
                'flat' => [
                    'label' => 'Площадь квартиры'
                ],
                'room' => [
                    'label' => 'Площадь комнаты'
                ]
            ]
        ],
    ]
];
