<?php

return [
        'analytics' => [
                'default'       => 'UA-104235029-1',
                'bcs'           => 'UA-104235029-2',
                'api'           => 'UA-104235029-3',
                'cert'          => 'UA-104235029-4',
        ],
        'sel_hour' => [
                '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시', '15' => '15시', '16' => '16시', '17' => '17시'
        ],

        'sms_callback' => '1833-6889',

        'cdn' => env('APP_CDN_DOMAIN', 'cdn.chagumsa.com'),

        'document_host' => 'https://cert.chagumsa.com/',
];
