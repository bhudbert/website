<?php

namespace App\Controller\FrontOffice;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/blog", name="blog_")
 *
 */
class PostController extends AbstractController
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(PostRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     */

    public function index()
    {
        $posts = $this->repository->findAll();
        return $this->render('frontoffice/post/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
