<?php

namespace App\Controller;

use App\Entity\User; // Assurez-vous que vous importez correctement la classe User
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends AbstractController
{
    /**
     * @Route("/user-form", name="user_form")
     */
    public function userForm(Request $request): Response
    {
        $user = new User(); // Remplacez User par le nom de votre modèle

        $form = $this->createFormBuilder($user)
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'btn btn-success'],
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez le formulaire ici, par exemple, enregistrez les données dans la base de données.
            // Redirigez ensuite ou affichez un message de succès.
        }

        return $this->render('votre_template/_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
