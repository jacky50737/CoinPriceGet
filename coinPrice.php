<?php
/**
 * Created by Jacky.
 * Project Name: CoinPriceGet.
 * Date Time: 2021/4/19 下午 04:20.
 */

declare(strict_types=1);

header('Content-Type: application/json');

if (isset($_GET["password"])) {
    $password = $_GET["password"];
} else {
    $password = "XXXXXX";
}

if ($password == "善鼎") {

    if (isset($_GET["market"])) {
        $market = $_GET["market"];
    } else {
        $market = "LINKUSDT";
    }

    $url = 'https://api.binance.com';
    $coinGet = '/api/v3/ticker/price?symbol=' . $market;
    $url_all = $url . $coinGet;

    try {
        $response = json_decode(file_get_contents($url_all));
        $data = ['price' => (double)$response->price];
    } catch (Exception $e) {
        $data = ['error' => "發生未知的錯誤：" . $e->getMessage()];
    }
} else {
    $data = ['error' => '密碼錯誤'];
}
echo json_encode($data);
