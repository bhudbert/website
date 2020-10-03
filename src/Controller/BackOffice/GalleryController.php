<?php

namespace App\Controller\BackOffice;

use App\Entity\Gallery;
use App\Form\GalleryType;
use App\Repository\GalleryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/gallery", name="admin_gallery")
 */
class GalleryController extends AbstractController
{

    /**
     * @var GalleryRepository
     */
    private $repository;

    /**dmin/category/?id=1
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
        return $this->render('backoffice/gallery/index.html.twig', [
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

            return $this->redirectToRoute("admin_gallery_home");
        }
        return $this->render('backoffice/gallery/edit.html.twig', [
            "galleryForm"=>$galleryForm->createView(),
        ]);
    }

    public function delete($id,Request $request)
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

            return $this->redirectToRoute("admin_gallery_home");
        }
        return $this->render('backoffice/gallery/edit.html.twig', [
            "galleryForm"=>$galleryForm->createView(),
        ]);
    }

}
