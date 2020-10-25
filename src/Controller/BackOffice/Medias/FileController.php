<?php

namespace App\Controller\BackOffice\Medias;

use App\Entity\File;
use App\Form\FileType;
use App\Repository\FileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/medias/file", name="admin_medias_file")
 */
class FileController extends AbstractController
{

    /**
     * @var FileRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(FileRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="_home")
     */

    public function index()
    {

        $files = $this->repository->findAll();
        return $this->render('backoffice/medias/file/index.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>?0}", name="_edit")
     */
    public function edit($id,Request $request)
    {
        if($id==0) {
            $file = new File();
        }
        else{
            $file= $this->repository->find($id);
        }

        $fileForm = $this->createForm(FileType::class,$file);

        $fileForm->handleRequest($request);
        if($fileForm->isSubmitted()){
            $this->em->persist($file);
            $this->em->flush();

            return $this->redirectToRoute("admin_medias_file_home");
        }
        return $this->render('backoffice/medias/file/edit.html.twig', [
            "galleryForm"=>$fileForm->createView(),
        ]);
    }

    /**
     * @Route("/publish/{id<\d+>?0}", name="_publish")
     */
    public function publish()
    {
        $files = $this->repository->findAll();
        return $this->render('backoffice/medias/file/publish.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>?0}", name="_delete")
     */
    public function delete($id,Request $request)
    {

        return $this->render('backoffice/medias/file/delete.html.twig');
    }

}
