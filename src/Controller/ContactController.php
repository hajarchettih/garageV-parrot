<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Adresse;
use App\Entity\Horaire;
use App\Form\ContactType;
use App\Repository\AdresseRepository;
use App\Repository\HoraireRepository;
use App\Repository\UserCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController

{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'app_contact')]
    public function new(
        Request $request,
        AdresseRepository $adresseRepository,
        HoraireRepository $horaireRepository,
        UserCarRepository $userCarRepository
    ): Response {
        $contact = new Contact();

        // Créez le formulaire de contact
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_contact_success');
        }

        $adresses = $adresseRepository->findOneBy([], []);
        $horaires = $horaireRepository->findAll();

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
            'adresses' => $adresseRepository->findOneBy([], []),
            'horaires' => $horaireRepository->findBy([], []),
            'userCar' => $userCarRepository->findBy([], []),
        ]);
    }

    #[Route('/contact/success', name: 'app_contact_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }
}
