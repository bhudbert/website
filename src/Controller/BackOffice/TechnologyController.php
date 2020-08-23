<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechnologyController extends AbstractController
{
    /**
     * @Route("/admin/technology", name="admin_technology")
     */
    public function index()
    {
        return $this->render('backoffice/technology/index.html.twig');
    }
}
