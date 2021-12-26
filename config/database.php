<?php
    return [
        'default' => env('DB_CONNECTION', 'mongodb'),
        'connections' => [
            'mongodb' => [
                'driver' => 'mongodb',
                'host' => env('DB_HOST', '192.168.1.143'),
                'port' => env('DB_PORT', 27017),
                'database' => env('TENDER'),
                'username' => env('licita'),
                'password' => env('Gsxr750@.'),
                'options' => [
                    'database' => 'TENDER' // sets the authentication database required by mongo 3
                ]
            ],
        ],
        'migrations' => 'migrations',
    ];