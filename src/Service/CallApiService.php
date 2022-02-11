<?php

namespace App\Service;

class CallApiService {

    /**
     * call API
     * @return mixed
     */
    function callAPI(string $url, string $name): mixed {
        $api = json_decode(file_get_contents($url), true);
        return $api[$name];
    }
}