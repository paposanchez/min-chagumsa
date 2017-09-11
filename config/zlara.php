<?php

return [

        'analytics' => 'UA-104235029-1',

        'cache' => [
                'use' => true,
                'tables' => [
                        'codes'
                ]
        ],

        'api' => [
                'domain'        => 'api.'. config('app.domain'),
                'version'       => '0.1.0'
        ]

];
