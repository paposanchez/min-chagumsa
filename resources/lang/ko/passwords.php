<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Password Reset Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are the default lines which match reasons
      | that are given by the password broker for a password update attempt
      | has failed, such as for an invalid token or invalid new password.
      |
     */
    "password" => "비밀번호는 최소한 6자리 이상이며 일치해야 합니다.",
    "user" => "이 이메일을 사용하는 사용자를 찾을 수 없습니다.",
    "token" => "이 비밀번호 초기화 토큰은 유효하지 않습니다.",
    "sent" => "비밀번호 초기화 링크를 이메일로 보내드렸습니다.",
    "reset" => "비밀번호를 초기화하였습니다.",




    'title' => '비밀번호변경',
    'desc' => '이메일을 통해 비밀번호를 갱신하려고 합니다. 비밀번호를 변경하려는 해당 계정의 이메일을 보내주십시오. 인증 메일이 발송됩니다.',


    'verify' => [
            'title' => '비밀번호변경',
            'desc' => '비밀번호를 변경합니다.',

            'success_message' => '비밀번호가 변경되었습니다. 로그인 하세요.',
            'fail_message' => '비밀번호 변경이 실패했습니다. 다시 시도해주세요.',
    ],




    'email' => '이메일',



    'reset-info' => '새 비밀번호를 만들려면이 양식을 작성하십시오.',
    'password' => '비밀번호',
    'confirm-password' => '비밀번호 확인',
    'warning' => '경고',
    'warning-password' => 'At least 8 characters',
    'reset' => '비밀번호 재설정',


    'email-subject' => '비밀번호 초기화',
    'email-intro' => '귀하의 계정에 대한 비밀번호 재설정 요청을 받았기 때문에 본 이메일이 발송되었습니다.',
    'email-click' => '아래 버튼을 클릭하여 비밀번호를 재설정하십시오.',
    'email-button' => '비밀번호 재설정',
    'email-end' => '비밀번호 재설정을 요청하지 않은 경우 추가 조치가 필요하지 않습니다.',
];
