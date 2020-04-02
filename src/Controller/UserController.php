<?php

namespace App\Controller;

use App\Form\RegisterType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {

        $user= new User();
     //   $registerForm = this->createForm(RegisterType::class,$user);

        return $this->render('user/register.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
