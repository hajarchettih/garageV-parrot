<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\UserLoginFormType;
use App\Entity\Admin;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
       
        $form = $this->createForm(UserLoginFormType::class);

        $error = $authenticationUtils->getLastAuthenticationError();

    
        $lastUsername = $authenticationUtils->getLastUsername();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
            $data = $form->getData();

            // Cherchez l'administrateur/ou user par son e-mail
            $admin = $entityManager->getRepository(User::class)->findOneBy(['email' => $data['email']]);
            $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $data['email']]);

            // Vérifiez si l'administrateur/ou user existe et que le mdp est correct
            if ($user && password_verify($data['password'], $user->getPassword())) {
                return $this->redirectToRoute('user');

            } elseif ($admin && password_verify($data['password'], $admin->getPassword())) {
                    return $this->redirectToRoute('admin');


            } else {
                // Affichez un message d'erreur si l'authentification a échoué
                $this->addFlash('error', 'Adresse e-mail ou mot de passe incorrect');
            }
        }

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
