<?php
/**
 * Created by Jacky.
 * Project Name: CoinPriceGet.
 * Date Time: 2021/4/19 下午 04:20.
 */

declare(strict_types=1);

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
    var_dump($url_all);
    $ch = curl_init();

    try {
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //$data = json_decode($response);
        var_dump($response);
        var_dump($httpCode);

//        var_dump($data);
//        return $data['price'];
        return $response;
    } catch (Exception $e) {
        var_dump($e);
        return "發生未知的錯誤：" . $e;
    }
} else {
    var_dump("密碼錯誤");
    return "密碼錯誤";
}


