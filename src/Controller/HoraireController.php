<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HoraireRepository; 


class HoraireController extends AbstractController
{
    private $horaireRepository;

    public function __construct(HoraireRepository $horaireRepository)
    {
        $this->horaireRepository = $horaireRepository;
    }

    #[Route('/horaire', name: 'app_horaire')]
    public function index(): Response
    {
        // Récupérez les horaires à partir du repository
        $horaires = $this->horaireRepository->findAll(); 

        return $this->render('horaire/index.html.twig', [
            'horaire' => $horaires, 
        ]);
    }
}





