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
        $response->price = (double)$response->price;
        var_dump($response);
        if(is_numeric($response->price))
        {
            return json_encode((array)$response->price);
        }else{
            return json_encode("請稍後再試!");
        }

    } catch (Exception $e) {
        return json_encode("發生未知的錯誤：" . $e);
    }
} else {
    return json_encode('密碼錯誤');
}



