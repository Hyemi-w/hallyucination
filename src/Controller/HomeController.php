<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param ArticleRepository $articleRepository
     * @Route("/", name="index")
     * @return Response
     */
    public function index(ArticleRepository $articleRepository) : Response
    {
        return $this->render('home/index.html.twig',[
            'articles' => $articleRepository->findBy([], ['date' => 'DESC'], 3)
        ]);
    }
}
