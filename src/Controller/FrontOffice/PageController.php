<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/apropos", name="aboutme")
     */
    public function aboutme()
    {
        return $this->render('frontoffice/page/aboutme.html.twig');
    }
}
