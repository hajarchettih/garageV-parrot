<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Temoignages;
use App\Form\TemoignagesType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TemoignagesRepository;

class TemoignagesController extends AbstractController
{
    private $entityManager;
    private $temoignagesRepository; 

    public function __construct(EntityManagerInterface $entityManager, TemoignagesRepository $temoignagesRepository)
    {
        $this->entityManager = $entityManager;
        $this->temoignagesRepository = $temoignagesRepository;
    }

    #[Route('/temoignages', name: 'app_temoignages')]
    public function index(Request $request): Response
    {
        $temoignages = new Temoignages();
        $form = $this->createForm(TemoignagesType::class, $temoignages);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($temoignages);
            $this->entityManager->flush();

            $this->addFlash('success', 'Votre témoignage a été soumis avec succès.');
        }

        // Récupérez les témoignages depuis la base de données
        $allTemoignages = $this->temoignagesRepository->findAll();

        return $this->render('temoignages/index.html.twig', [
            'controller_name' => 'TemoignagesController',
            'temoignages' => $allTemoignages, // Passez les témoignages à la vue
            'form' => $form->createView(),
        ]);
    }
}


