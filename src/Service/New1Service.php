<?php

namespace App\Service;

class New1Service {

    /**
     * call Api on site : mediastack.com
     * @return mixed
     */
    function callAPI(): mixed {
        $queryString = http_build_query([
            'access_key' => '6686f18aa11ae791d64637c0b67123f1',
            'languages' => 'fr',
        ]);
        $ch = curl_init(sprintf("%s?%s","http://api.mediastack.com/v1/news", $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $apiResult = json_decode($json, true);
        return array_splice($apiResult['data'], 20);
    }
}