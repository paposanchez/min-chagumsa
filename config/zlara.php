<?php

return [
        'cache' => [
                'use' => true,
                'lifetime' => 60, // minutes

                'tables' => [
                        'codes'
                ]
        ],

        'api' => [
                'domain'        => 'api.'. config('app.domain'),
                'version'       => '0.2.0'
        ]
];
