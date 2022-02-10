<?php

namespace App\Service;

class New2Service {

    /**
     * call Api on site : newsapi.org
     * @return mixed
     */
    function callAPI(): mixed {
        $queryString = http_build_query([
            'q' => 'Apple',
            'from' => '2022-02-10',
            'sortBy' => 'popularity',
            'apiKey' => '8cf5c5824cf94666a89363d0692b897d',
            'language' => 'fr',
        ]);
        $ch = curl_init(sprintf("%s?%s","https://newsapi.org/v2/everything", $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $apiResult = json_decode($json, true);
        return array_splice($apiResult['articles'], 15);
    }

}