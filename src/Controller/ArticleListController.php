<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleListController extends AbstractController
{
    /**
     * @param ArticleRepository $articleRepository
     * @Route("/articles", name="articles-index")
     * @return Response
     */
    public function index(ArticleRepository $articleRepository) : Response
    {
        return $this->render('articlelist/index.html.twig', [
            'articles' => $articleRepository->findBy([], ['date' => 'DESC'])
        ]);
    }
}
