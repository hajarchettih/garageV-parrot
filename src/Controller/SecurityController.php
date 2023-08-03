<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\AdminLoginFormType;
use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
        // Créez le formulaire de connexion pour l'administrateur
        $form = $this->createForm(AdminLoginFormType::class);

        // Récupérez les erreurs de connexion s'il y en a
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupérez le dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        // Gérez la soumission du formulaire de connexion
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez les données du formulaire
            $data = $form->getData();

            // Cherchez l'administrateur par son adresse e-mail
            $admin = $entityManager->getRepository(Admin::class)->findOneBy(['email' => $data['email']]);

            // Vérifiez si l'administrateur existe et que le mot de passe est correct
            if ($admin && password_verify($data['password'], $admin->getPassword())) {
                // Connectez l'administrateur
                // Vous pouvez utiliser ici le système de connexion Symfony ou créer une méthode de connexion personnalisée
                // ...

                // Redirigez vers la page d'administration EasyAdmin ou une autre page appropriée
                // ...

                // Vous pouvez également afficher un message de succès ou faire d'autres traitements
                // ...

                return $this->redirectToRoute('easyadmin'); // Redirection vers EasyAdmin par exemple
            } else {
                // Affichez un message d'erreur si l'authentification a échoué
                $this->addFlash('error', 'Adresse e-mail ou mot de passe incorrect');
            }
        }

        // Rendez le formulaire de connexion dans le template twig
        return $this->render('security/login.html.twig', [
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
