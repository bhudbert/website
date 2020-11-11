<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/apropos", name="aboutme")
     */
    public function aboutme(): Response
    {
        return $this->render('frontoffice/about/index.html.twig');
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('frontoffice/about/contact.html.twig');
    }
}
