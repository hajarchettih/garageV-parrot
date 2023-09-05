<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; // Import manquant pour la classe Request
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\UserCar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCarController extends AbstractController
{   
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/usercar', name: 'app_car')]
    public function appCar(Request $request): Response
    {
        $orderBy = $request->query->get('order_by', 'price_asc'); // Ajout du point-virgule

        $cars = $this->entityManager->getRepository(UserCar::class)->findAll();
        
        if ($orderBy === 'price_asc') {
            usort($cars, function ($a, $b) {
                return $a->getPrice() - $b->getPrice();
            });
    
        } elseif ($orderBy === 'mileage_asc') {
            usort($cars, function ($a, $b) {
                return $a->getMileage() - $b->getMileage();
            });
      
        } elseif ($orderBy === 'year_asc') {
            usort($cars, function ($a, $b) {
                return $a->getYear() - $b->getYear();
            });
        }
        
        return $this->render('usercar/index.html.twig', [
            'controller_name' => 'UserCarController',
            'usercars' => $cars,
        ]);
    }
}
