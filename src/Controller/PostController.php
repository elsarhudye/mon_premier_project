<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/', name: 'post_home')]
    public function home(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        //dd($posts);
        return $this->render('post/index.html.twig', [
            'bg_image' => 'clean/assets/img/home-bg.jpg',
            'posts' => $posts,
        ]);
    }


    #[Route('/post/{slug}', name: 'post_view')]
    public function view(Post $post): Response
    {
        //dd($post);
        return $this->render('post/view.html.twig', [
            'bg_image' => $post->getImage(),
            'post' => $post
        ]);
    }
}
