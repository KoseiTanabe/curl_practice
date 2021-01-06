<?php
//情報を取得したいURL
$url = 'https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
$result = json_decode($json);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>現在のビットコインの価格取得</title>
</head>
<body>
<h1>現在のビットコイン価格</h1>
<?php echo number_format($result->ltp) . '円'; ?>
</body>
</html>
