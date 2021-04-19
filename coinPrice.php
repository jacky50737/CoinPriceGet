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
    $binanceApiKey = 'ysSQb0zgMyxsF3knmh44MS3vcqyvBpT80XKrpuk4xnRVf1a2fLiaQaER4JXSrnRt';
    $binanceApiSecret = 'YaIYBzTXEJSh5nAAFLkYR1bGDMl4mwaNfvwe3dtULr5GvLodZTHTLCRei9aRs8kT';
    $coinGet = '/api/v3/ticker/price?symbol=' . $market;
    $url_all = $url . $coinGet;

    try {
        $response = json_decode(file_get_contents($url_all));
        $data = ['price' => (double)$response->price];
        if (!is_numeric($data)) {
            $msg = ['error' => '密碼錯誤','price' => (double)$response->price];
            $data = json_encode($msg);
        }
    } catch (Exception $e) {
        $msg = ['error' => "發生未知的錯誤：" . $e->getMessage()];
        $data = json_encode($msg);
    }
} else {
    $msg = ['error' => '密碼錯誤'];
    $data = json_encode($msg);
}
var_dump($data);
return $data;
