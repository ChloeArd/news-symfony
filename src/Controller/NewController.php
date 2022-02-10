<?php

namespace App\Controller;

use App\Service\NewsAgregator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    #[Route('/', name: 'news')]
    public function getNews(NewsAgregator $newsAgregator): Response {
        $allNews = $newsAgregator->AllNews();
        return $this->render('new/index.html.twig', [
            'news' => $allNews,
        ]);
    }

    #[Route('/new/{api<\d+>}/{id<\d+>}', name: 'new')]
    public function getNewId(int $api, int $id, NewsAgregator $newsAgregator): Response {
        $allNews = $newsAgregator->AllNews();
        $oneNew = $allNews[$api][$id];
        return $this->render('new/new.html.twig', ["oneNew" => $oneNew]);
    }
}
