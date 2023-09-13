<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\UserCar;
use App\Entity\Contact;
use App\Entity\Horaire; 
use App\Form\ContactType;
use App\Repository\AdresseRepository;
use App\Repository\HoraireRepository;
use App\Repository\UserCarRepository;
use App\Repository\ContactRepository;


class UserCarController extends AbstractController
{
    private $entityManager;
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager, ContactRepository $contactRepository)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $contactRepository;
    }

    #[Route('/car', name: 'app_car', methods: ['GET', 'POST'])]
    public function index(
        UserCarRepository $userCarRepository,
        AdresseRepository $adresseRepository,
        HoraireRepository $horaireRepository,
        Request $request
    ): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_contact_success');
        }

        return $this->render('usercar/index.html.twig', [
            'userCar' => $userCarRepository->findBy([], []),
            'adresse' => $adresseRepository->findOneBy([], []),
            'horaire' => $horaireRepository->findBy([], []),
            'form' => $form->createView(),
        ]);
    }
}
