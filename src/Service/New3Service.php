<?php

namespace App\Service;

class New3Service {

    /**
     * call Api on site : newsdata.io
     * @return mixed
     */
    function callAPI(): mixed {
        $queryString = http_build_query([
            'apiKey' => 'pub_44668dedc5f95e0f8c5cc6775309d7d3a1db',
            'q' => 'news',
            'language' => 'fr',
        ]);
        $ch = curl_init(sprintf("%s?%s","https://newsdata.io/api/1/news", $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $apiResult = json_decode($json, true);
        return array_splice($apiResult['results'], 5);
        //json_decode(file_get_contents("https://newsdata.io/api/1/news?apikey=pub_44668dedc5f95e0f8c5cc6775309d7d3a1db&q=news&language=fr"));
    }

}