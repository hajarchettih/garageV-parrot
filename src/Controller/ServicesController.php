<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository; 

class ServicesController extends AbstractController
{
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        // Récupérez les données de services à partir du référentiel (repository) ServiceRepository
        $services = $this->serviceRepository->findAll();

        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }
}
