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
            ],
            'rent_period' => [
                'label' => 'Срок аренды'
            ]
        ],
    ],
    'validation' => [
        'street' => [
            'required' => 'Необходимо указать корректный адрес'
        ],
        'images' => [
            'required' => 'Необходимо загрузить хотя бы одно изображение'
        ],
        'main_image_id' => [
            'required' => 'Необходимо выбрать основное фото'
        ],
        'rent_period' => [
            'required' => 'Необходимо выбрать срок аренды'
        ]
    ],
    'title' => [
        'flat' => '{0} Студия, :area кв.м|[1,7] :rooms-комн квартира, :area кв.м|[8,*] :rooms-комн и более квартира, :area кв.м',
        'room' => '[1,7] Комната в :rooms-комн. квартире|[8,*] Комната в :rooms-комн. и более квартире'
    ],
    'rent_period' => [
        'long' => [
            'name' => 'Долгосрочный'
        ],
        'short' => [
            'name' => 'Краткосрочный'
        ]
    ]


];
