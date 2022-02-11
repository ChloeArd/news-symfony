<?php

namespace App\Service;

class NewsAgregator {

    /**
     * return all news to json
     * @return mixed
     */
    public function AllNews(): mixed {
        $recoverNews = json_decode(file_get_contents(__DIR__ . "/news.json"));
        if (empty($recoverNews)) {
            $news = [];
            $service = new New1Service();
            $new1 = $service->callAPI();
            $service = new New2Service();
            $new2 = $service->callAPI();
            $service = new New3Service();
            $new3 = $service->callAPI();
            array_push($news, $new1, $new2, $new3);
            file_put_contents(__DIR__ . "/news.json", json_encode($news));
        }
        return json_decode(file_get_contents(__DIR__ . "/news.json"));
    }

    public function add() {
        $news = json_decode(file_get_contents(__DIR__ . "/news.json"));
        $callApiService = new CallApiService();
        $newApi = $callApiService->callAPI("http://api.mediastack.com/v1/news?access_key=6686f18aa11ae791d64637c0b67123f1&languages=en", "data");
        array_push($news, $newApi);
        $add =  file_put_contents(__DIR__ . "/news.json", json_encode($news));
        return $add;
    }
}