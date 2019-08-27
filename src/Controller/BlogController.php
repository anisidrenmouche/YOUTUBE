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
     *@Route("/blog/contact", name="blog_contact")
     */
    
    public function contact()
    {
        return $this->render('blog/contact.html.twig');
    }

         /**
         *@Route("/blog/faq", name="blog_faq")
         */

        public function faq (){
            return $this->render('blog/faq.html.twig');

        }

        /**
         * @Route("/blog/new", name="blog_create")
         */

        public function create(){
            return $this->render('blog/create.html.twig');
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





