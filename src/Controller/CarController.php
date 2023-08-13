<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; // Import manquant pour la classe Request
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;

class CarController extends AbstractController
{   
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/car', name: 'app_car')]
    public function list(Request $request): Response // Ajout du paramètre $request
    {
        $orderBy = $request->query->get('order_by', 'price_asc'); // Ajout du point-virgule

        $cars = $this->entityManager->getRepository(Car::class)->findAll();
        
        if ($orderBy === 'price_asc') {
            usort($cars, function ($a, $b) {
                return $a->getPrice() - $b->getPrice();
            });
        } elseif ($orderBy === 'price_desc') {
            usort($cars, function ($a, $b) {
                return $b->getPrice() - $a->getPrice();
            });
        } elseif ($orderBy === 'mileage_asc') {
            usort($cars, function ($a, $b) {
                return $a->getMileage() - $b->getMileage();
            });
        } elseif ($orderBy === 'mileage_desc') {
            usort($cars, function ($a, $b) {
                return $b->getMileage() - $a->getMileage();
            });
        } elseif ($orderBy === 'year_asc') {
            usort($cars, function ($a, $b) {
                return $a->getYear() - $b->getYear();
            });
        } elseif ($orderBy === 'year_desc') {
            usort($cars, function ($a, $b) {
                return $b->getYear() - $a->getYear();
            });
        }
        
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars,
        ]);
    }
}
