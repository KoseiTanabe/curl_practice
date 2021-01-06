<?php
//情報を取得したいURL
$url = 'https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY';
//cURLセッションの初期化。cURLハンドルを返す
$ch = curl_init();
/* cURL転送時のオプションの設定
取得するURLを指定する*/
curl_setopt($ch, CURLOPT_URL, $url);
//curl_execの返り値を文字列で返す
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//cURLセッションの実行
$json = curl_exec($ch);
//json形式の文字列をPHPの変数に変換。オプションに何も設定しないとオブジェクト形式になる
$result = json_decode($json);
//number_formatを使い価格を千の位まいに区切る
$price = number_format($result->ltp);
//メール内の言語をどの国の言語にするか
mb_language('Japanese');
//エンコーディングする時の文字コードをどれにするか
mb_internal_encoding('UTF-8');
//メールの送り先
$to = '送りたいメールアドレス';
//メールの件名
$subject = '現在のビットコインの価格';
//メールの本文
$message = '現在のビットコインの価格は' . $price . '円です';
//送り主
$headers = 'From: hoge@hoge.co.jp';
$result = mb_send_mail($to, $subject, $message, $headers);
//curlセッションを閉じる
curl_close($ch);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>現在のビットコインの価格取得</title>
</head>
<body>
<?php if ($result): ?>
<?php echo 'メールを送信しました'; ?>
<?php endif; ?>
</body>
</html>
