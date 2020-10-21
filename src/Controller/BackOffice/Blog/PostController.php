<?php

namespace App\Controller\BackOffice\Blog;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/blog", name="admin_blog")
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
     * @Route("/", name="_home")
     */
    public function index()
    {
        $posts = $this->repository->findAll();
        return $this->render('backoffice/post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>?0}", name="_edit")
     */
    public function edit($id,Request $request)
    {
        if($id==0) {
            $post = new Post();
        }
        else{
            $post= $this->repository->find($id);
        }

        $postForm = $this->createForm(PostType::class,$post);

        $postForm->handleRequest($request);
        if($postForm->isSubmitted()){
            $this->em->persist($post);
            $this->em->flush();

            return $this->redirectToRoute("admin_blog_home");
        }
        return $this->render('backoffice/post/edit.html.twig', [
            "postForm"=>$postForm->createView(),
        ]);
    }
    public function delete($id,Request $request)
    {
        if($id==0) {
            $post = new Post();
        }
        else{
            $post= $this->repository->find($id);
        }

        $postForm = $this->createForm(PostType::class,$post);

        $postForm->handleRequest($request);
        if($postForm->isSubmitted()){
            $this->em->persist($post);
            $this->em->flush();

            return $this->redirectToRoute("admin_blog_home");
        }
        return $this->render('backoffice/post/edit.html.twig', [
            "postForm"=>$postForm->createView(),
        ]);
    }

    public function publish($id,Request $request)
    {
        if($id==0) {
            $post = new Post();
        }
        else{
            $post= $this->repository->find($id);
        }

        $postForm = $this->createForm(PostType::class,$post);

        $postForm->handleRequest($request);
        if($postForm->isSubmitted()){
            $this->em->persist($post);
            $this->em->flush();

            return $this->redirectToRoute("admin_blog_home");
        }
        return $this->render('backoffice/post/edit.html.twig', [
            "postForm"=>$postForm->createView(),
        ]);
    }
}
