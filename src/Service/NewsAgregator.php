<?php

namespace App\Service;

class NewsAgregator {

    /**
     * @return array
     */
    public function AllNews() {
        $news = [];
        $service = new New1Service();
        $new1 = $service->callAPI();
        $service = new New2Service();
        $new2 = $service->callAPI();
        $service = new New3Service();
        $new3 = $service->callAPI();
        array_push($news, $new1, $new2, $new3);
        return $news;
    }

}