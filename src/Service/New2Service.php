<?php

namespace App\Service;

class New2Service {

    /**
     * call Api on site : newsapi.org
     * @return mixed
     */
    function callAPI(): mixed {
        $api = json_decode(file_get_contents("https://newsapi.org/v2/everything?q=Apple&apikey=8cf5c5824cf94666a89363d0692b897d&language=fr"), true);
        return $api['articles'];
    }

}