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
 * @Route("/", name="")
 */
    public function index2()
    {
        return $this->render('backoffice/default/index.html.twig');
    }
    /**
     * @Route("/global_settings", name="global_settings")
     */
    public function index3()
    {
        return $this->render('backoffice/default/index.html.twig');
    }
}
