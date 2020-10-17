<?php

namespace App\Controller\BackOffice\Medias;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/medias", name="admin_medias_")
 *
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="home")
     */
    public function index()
    {
        return $this->render('backoffice/medias/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
