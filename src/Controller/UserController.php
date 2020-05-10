<?php

namespace App\Controller;

use App\Form\RegisterType;

use App\Entity\User;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user", name="user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/register", name="_register")
     */
    public function register(
                            Request $request,
                            EntityManagerInterface $em,
                            UserPasswordEncoderInterface $encoder
                            )
        {

           $user= new User();
           $registerForm = $this->createForm(RegisterType::class,$user);

           $registerForm->handleRequest($request);
           if($registerForm->isSubmitted() && $registerForm->isValid())
           {
               $user->setCreatedAt(new \DateTime());
               $hashed=$encoder->encodePassword($user,$user->getPassword());

               $user->setPassword($hashed);
               $em->persist($user);
               $em->flush();
           }
            return $this->render('user/register.html.twig', [
                'registerForm' => $registerForm->createView()
            ]);
        }

    /**
     * @Route("/login", name="_login")
     */

    public function login(){

        return $this->render("user/login.html.twig");
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout(){}
}
