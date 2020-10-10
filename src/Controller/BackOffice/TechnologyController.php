<?php

namespace App\Controller\BackOffice;

use App\Entity\Technology;
use App\Form\TechnologyType;
use App\Repository\TechnologyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/global_settings/technology", name="admin_global_technology")
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
        return $this->render('backoffice/technology/index.html.twig', [
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

            return $this->redirectToRoute("admin_technology_home");
        }
        return $this->render('backoffice/technology/edit.html.twig', [
            "technologyForm"=>$technologyForm->createView(),
        ]);
    }

    public function delete($id,Request $request)
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

            return $this->redirectToRoute("admin_technology_home");
        }
        return $this->render('backoffice/technology/edit.html.twig', [
            "technologyForm"=>$technologyForm->createView(),
        ]);
    }

}