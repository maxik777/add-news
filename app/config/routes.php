<?php

return[
    'news/index/'=>[
        'controller'=>'news',
        'action'=>'index'
    ],

    'news/index/{page:\d+}'=>[
        'controller'=>'news',
        'action'=>'index'
    ],

    'all/{id:\d+}'=>[
        'controller'=>'news',
        'action'=>'show'
    ],

    'update/{id:\d+}'=>[
        'controller'=>'news',
        'action'=>'update'
    ],

    'delete/{id:\d+}'=>[
        'controller'=>'news',
        'action'=>'delete'
    ],

    'add'=>[
        'controller'=>'news',
        'action'=>'add'
    ]
];