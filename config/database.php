<?php
    return [
        'default' => env('DB_CONNECTION', 'mongodb'),
        'connections' => [
            'mongodb' => [
                'driver' => 'mongodb',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', 27017),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'options' => [
                    'database' => 'admin' // sets the authentication database required by mongo 3
                ]
            ],
        ],
        'migrations' => 'migrations',
    ];