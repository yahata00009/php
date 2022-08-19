<?php

function validation($request)
{

    $errors = [];
    if (empty($request['your_name'] || 20 < mb_strlen($request['your_name']))) {
        $errors[] = '氏名は必須です。20字以内で入力！';
    }
    if (empty($request['email']) || !filter_var(($request['email']), FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'メールアドレス形式で!';
    }
    if (!empty($request['url'])) {
        if (!filter_var($request['url'], FILTER_VALIDATE_URL)) {
            $errors[] = "ホームページは正しい形式で！";
        }
    }
    if (!isset($request['gender'])) {
        $errors[] = '性別を指定して!';
    }
    if (empty($request['age'] || 6 < $request['age'])) {
        $errors[] = '年齢を選択して!';
    }
    if (empty($request['contact'] || 200 < mb_strlen($request['contact']))) {
        $errors[] = '問い合わせ内容は必須です。200字以内で入力！';
    }
    if (empty($request['caution'])) {
        $errors[] = '注意事項をチェックしろ!';
    }
    return $errors;
};
