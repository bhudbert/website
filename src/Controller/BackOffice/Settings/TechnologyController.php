<?php

namespace App\Controller\BackOffice\Settings;

use App\Entity\Technology;
use App\Form\TechnologyType;
use App\Repository\TechnologyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/settings/technology", name="admin_settings_technology")
 */
class TechnologyController extends AbstractController
{

    /**
     * @var TechnologyRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(TechnologyRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/", name="_home")
     */
     public function index()
    {
        $technologies = $this->repository->findAll();
        return $this->render('backoffice/settings/technology/index.html.twig', [
            'technologies' => $technologies,
        ]);
    }
    /**
     * @Route("/edit/{id<\d+>?0}", name="_edit")
     */
    public function edit($id,Request $request)
    {
        if($id==0) {
            $technology = new Technology();
        }
        else{
            $technology= $this->repository->find($id);
        }

        $technologyForm = $this->createForm(TechnologyType::class,$technology);

        $technologyForm->handleRequest($request);
        if($technologyForm->isSubmitted()){
            $this->em->persist($technology);
            $this->em->flush();

            return $this->redirectToRoute("admin_settings_technology_home");
        }
        return $this->render('backoffice/settings/technology/edit.html.twig', [
            "technologyForm"=>$technologyForm->createView(),
        ]);
    }

    /**
     * @Route("/publish/{id<\d+>?0}", name="_publish")
     */
    public function publish()
    {
        $technologies = $this->repository->findAll();
        return $this->render('backoffice/settings/technology/publish.html.twig', [
            'technologies' => $technologies,
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>?0}", name="_delete")
     */
    public function delete($id,Request $request)
    {
        $this->em->remove($id);
        $this->em->flush();
        return $this->render('backoffice/settings/technology/delete.html.twig');
    }

}