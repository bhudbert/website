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
            return $this->render('frontoffice/maintenance.html.twig');
        }
      else
        {
            return $this->render('frontoffice/index.html.twig');
        }
    }
}
