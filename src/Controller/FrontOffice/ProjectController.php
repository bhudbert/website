<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/projet", name="project_")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('frontoffice/project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
}
