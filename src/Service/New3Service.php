<?php

namespace App\Service;

class New3Service {

    /**
     * call Api on site : newsdata.io
     * @return mixed
     */
    function callAPI(): mixed {
        $api = json_decode(file_get_contents("https://newsdata.io/api/1/news?apikey=pub_44668dedc5f95e0f8c5cc6775309d7d3a1db&q=news&language=fr"), true);
        return $api['results'];
    }

}