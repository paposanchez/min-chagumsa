<?php

return [
        'analytics' => [
                'default' => 'UA-104235029-1',
                'bcs' => 'UA-104235029-2',
                'api' => 'UA-104235029-3',
                'cert' => 'UA-104235029-4',
        ],

        'cache' => [
                'use' => true,
                'lifetime' => 60, // minutes

                'tables' => [
                        'codes'
                ]
        ],

        'api' => [
                'domain'        => 'api.'. config('app.domain'),
                'version'       => '0.1.0'
        ]

];
