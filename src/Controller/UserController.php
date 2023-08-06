<?php

namespace App\Controller;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 class UserController extends AbstractController
{
    #[Route(path: "/_form.html.twig", name: "new_contact")]
    public function newContact(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
         return $this->render('_form.html.twig', ['form' => $form->createView()]);
    }
}