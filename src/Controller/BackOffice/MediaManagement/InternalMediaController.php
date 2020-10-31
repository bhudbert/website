<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InternalMediaController extends AbstractController
{
    /**
     * @Route("/media/embed", name="media_embed")
     */
    public function index(): Response
    {
        return $this->render('media_embed/index.html.twig', [
            'controller_name' => 'MediaEmbedController',
        ]);
    }
}
