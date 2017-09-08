<?php

return [


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
