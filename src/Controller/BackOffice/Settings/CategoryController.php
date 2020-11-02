<?php

namespace App\Controller\BackOffice\Settings;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/admin/Settings/category", name="admin_settings_category")
 *
 */
class CategoryController extends AbstractController
{
       /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(CategoryRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="_home")
     */
    public function index()
    {
        $categories = $this->repository->findAll();
        return $this->render('backoffice/settings/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>?0}", name="_edit")
     */
    public function edit($id,Request $request)
    {
        if($id==0) {
            $category = new Category();
        }
        else{
            $category= $this->repository->find($id);
        }

        $categoryForm = $this->createForm(CategoryType::class,$category);

        $categoryForm->handleRequest($request);
        if($categoryForm->isSubmitted()){
            $this->em->persist($category);
            $this->em->flush();

            return $this->redirectToRoute("admin_settings_category_home");
        }
        return $this->render('backoffice/settings/category/edit.html.twig', [
            "categoryForm"=>$categoryForm->createView(),
        ]);
    }

    /**
     * @Route("/publish/{id<\d+>?0}", name="_publish")
     */
    public function publish()
    {
        $technologies = $this->repository->findAll();
        return $this->render('backoffice/settings/category/publish.html.twig', [
            'technologies' => $technologies,
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>?0}", name="_delete")
     */
    public function delete($id,Request $request)
    {

        return $this->render('backoffice/settings/category/delete.html.twig');
    }
 }
