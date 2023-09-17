<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;
use App\Repository\HoraireRepository;
use App\Repository\AdresseRepository; 

class ServicesController extends AbstractController
{
    private $serviceRepository;
    private $horaireRepository;
    private $adresseRepository;

    public function __construct(
        ServiceRepository $serviceRepository,
        HoraireRepository $horaireRepository,
        AdresseRepository $adresseRepository // Ajoutez le repository AdresseRepository
    ) {
        $this->serviceRepository = $serviceRepository;
        $this->horaireRepository = $horaireRepository;
        $this->adresseRepository = $adresseRepository; // Injectez le repository AdresseRepository
    }
    

    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        // Récupérez les données de services à partir du référentiel (repository) ServiceRepository
        $services = $this->serviceRepository->findAll();
        $horaires = $this->horaireRepository->findAll();
        $adresses = $this->adresseRepository->findAll();

        return $this->render('services/index.html.twig', [
            'services' => $services,
            'horaires' => $horaires,
            'adresses' => $adresses,
        ]);
    }
}
