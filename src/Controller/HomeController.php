<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TemoignagesRepository;
use App\Repository\HoraireRepository;
use App\Repository\AdresseRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TemoignagesRepository $temoignagesRepository, HoraireRepository $horaireRepository, AdresseRepository $adresseRepository): Response
    {
        // Récupérez les témoignages et les horaires depuis les repositories
        $temoignages = $temoignagesRepository->findBy([], []);
        $horaire = $horaireRepository->findAll(); // Ou utilisez la méthode appropriée pour récupérer les horaires
        $adresse = $adresseRepository->findAll();

        return $this->render('home/home.html.twig', [
            'temoignages' => $temoignages,
            'horaires' => $horaire, // Passez les horaires à la vue
            'adresses' => $adresse,
        ]);
    }
}

