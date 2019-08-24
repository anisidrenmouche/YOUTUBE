<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        /*repo =$this->getDoctrine()->getRepository(Article :: class);*/

        $article = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $article
        ]);
    }
    /**
     * @Route("/", name="home") 
     */
    public function home(){
        return $this->render('blog/home.html.twig');
    }

        /**
        * @Route("/blog/{id}", name="blog_show") 
        */
        public function show (ArticleRepository $repo, $id){
            /* $repo = $this->getDoctrine()->getRepository(Article :: class);*/

            $article = $repo->find($id);
            return $this->render('blog/show.html.twig', [
                'article' => $article
            ]);
        }
 
     }





