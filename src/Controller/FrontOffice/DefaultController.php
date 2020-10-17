<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        if(  $_ENV['MAINTENANCE']=='true')
        {
            return $this->render('frontoffice/main/maintenance.html.twig');
        }
      else
        {
            return $this->render('frontoffice/main/index.html.twig');
        }
    }
}
