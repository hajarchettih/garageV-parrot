<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Temoignages;
use App\Form\TemoignagesType;
use Doctrine\ORM\EntityManagerInterface;

class TemoignagesController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
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

        $this->addFlash('sucess','Votre témoignage a été soumis avec succès.');

    }
    
        return $this->render('temoignages/index.html.twig', [
            'controller_name' => 'TemoignagesController',
        ]);
    }
}
