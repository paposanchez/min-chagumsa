<?php

return [
        /*
        |--------------------------------------------------------------------------
        | Authentication Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used during authentication for various
        | messages that we need to display to the user. You are free to modify
        | these language lines according to your application's requirements.
        |
        */
        'login' => '로그인',
        'logout' => '로그아웃',
        'not-found' => '회원정보를 찾을 수 없습니다.',
        'failed' => '이메일 또는 패스워드가 일치하지 않습니다.',
        'throttle' => '너무 많이 시도했습니다. :seconds 분후에 다시 시도해 주세요.',
        'status' => [
                "leaved" => '해당 계정은 현재 탈퇴한 상태입니다. 관리자에게 문의하세요.',
                "unactive" => '해당 계정은 비활성 상태입니다. 인증메일을 확인하세요.',
                'unauthorized' => '접근권한이 없습니다',
        ],
        'token-mismatch' => '세션이 만료되었습니다. 다시 로그인 하세요.'
];
