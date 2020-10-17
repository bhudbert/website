<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('backoffice/default/index.html.twig');
    }

    /**
     * @Route("/medias/home", name="medias_home")
     */
    public function medias()
    {
        return $this->render('backoffice/default/index.html.twig');
    }

}
