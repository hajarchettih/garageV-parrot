<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoraireController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/horaire', name: 'app_horaire')]
    public function index(): Response
    {
        $this->entityManager;

        return $this->render('horaire/index.html.twig', [
            'controller_name' => 'HoraireController',
        ]);
    }
}