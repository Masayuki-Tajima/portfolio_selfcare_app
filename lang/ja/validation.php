<?php

return [
    'required' => ':attribute は必須項目です。',
    'email'    => ':attribute は有効なメールアドレス形式で入力してください。',
    'max'      => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'confirmed' => ':attribute と確認用パスワードの値が一致しません。',
    'unique'    => '同じ :attribute は使用できません。',

    'attributes' => [
        'name'                  => 'ユーザー名',
        'email'                 => 'メールアドレス',
        'password'              => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'date'                  => '日付',
        'sleep_time'            => '就寝時刻',
        'wakeup_time'           => '起床時刻',
        'exercise'              => '運動',
        'breakfast'             => '朝食',
        'lunch'                 => '昼食',
        'dinner'                => '夕食',
        'comment'               => 'コメント',
        'sign'                  => '体調サイン',
        'sign_type'             => 'サインの種類'
    ],
];
