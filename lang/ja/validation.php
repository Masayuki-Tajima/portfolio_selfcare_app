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
    ],
];
