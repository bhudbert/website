<?php

namespace App\Controller\BackOffice\Settings;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/settings", name="admin_settings_")
 *
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="home")
     */
    public function index()
    {
        return $this->render('backoffice/settings/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
