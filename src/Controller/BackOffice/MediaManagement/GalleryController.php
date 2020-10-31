<?php

namespace App\Controller\BackOffice\MediaManagement;

use App\Entity\Gallery;
use App\Form\GalleryType;
use App\Repository\GalleryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/medias/gallery", name="admin_medias_gallery")
 */
class GalleryController extends AbstractController
{

    /**
     * @var GalleryRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(GalleryRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/", name="_home")
     */

    public function index()
    {

        $galleries = $this->repository->findAll();
        return $this->render('backoffice/medias/gallery/index.html.twig', [
            'galleries' => $galleries,
        ]);
    }
    /**
     * @Route("/edit/{id<\d+>?0}", name="_edit")
     */
    public function edit($id,Request $request)
    {
        if($id==0) {
            $gallery = new Gallery();
        }
        else{
            $gallery= $this->repository->find($id);
        }

        $galleryForm = $this->createForm(GalleryType::class,$gallery);

        $galleryForm->handleRequest($request);
        if($galleryForm->isSubmitted()){
            $this->em->persist($gallery);
            $this->em->flush();

            return $this->redirectToRoute("admin_medias_gallery_home");
        }
        return $this->render('backoffice/medias/gallery/edit.html.twig', [
            "galleryForm"=>$galleryForm->createView(),
        ]);
    }

    /**
     * @Route("/publish/{id<\d+>?0}", name="_publish")
     */
    public function publish()
    {
        $technologies = $this->repository->findAll();
        return $this->render('backoffice/medias/gallery/publish.html.twig', [
            'technologies' => $technologies,
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>?0}", name="_delete")
     */
    public function delete($id,Request $request)
    {

        return $this->render('backoffice/medias/gallery/delete.html.twig');
    }

}
