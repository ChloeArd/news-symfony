<?php

namespace App\Controller;

use App\Service\NewsAgregator;
use Doctrine\DBAL\Driver\OCI8\Exception\Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController {

    /**
     * display on home page, all news
     * @param NewsAgregator $newsAgregator
     * @return Response
     */
    #[Route('/', name: 'news')]
    public function getNews(NewsAgregator $newsAgregator): Response {
        $allNews = $newsAgregator->AllNews();
        return $this->render('new/index.html.twig', [
            'news' => $allNews,
        ]);
    }

    /**
     * display one new
     * @param int $api
     * @param int $id
     * @param NewsAgregator $newsAgregator
     * @return Response
     */
    #[Route('/new/{api<\d+>}/{id<\d+>}', name: 'new')]
    public function getNewId(int $api, int $id, NewsAgregator $newsAgregator): Response
    {
        $allNews = $newsAgregator->AllNews();
        $oneNew = $allNews[$api][$id];
        return $this->render('new/new.html.twig', ["oneNew" => $oneNew]);
    }

    /**
     * add a api of news
     * @param NewsAgregator $newsAgregator
     * @return Response
     */
    #[Route('/new/add', name: 'add')]
    public function add(NewsAgregator $newsAgregator): Response {
        try {
            $success = $newsAgregator->add();
        }
        catch (Error $e) {
            $success = false;
        }

        if ($success) {
            return new Response("<h1>L'API a été ajouté avec succès !</h1>");
        }

        return new Response("<h1>Erreur en ajoutant l'API !</h1>");
        //return $this->render('new/add.html.twig');
        }
}
