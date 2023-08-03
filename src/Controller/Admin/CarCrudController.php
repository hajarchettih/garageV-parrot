<?php

namespace App\Controller\Admin;


use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    // Ajoutez vos autres méthodes pour la gestion des voitures ici

    #[Route('/admin/car/new', name: 'admin_car_new')]
    public function newCar(): Response
    {
        // Créez le formulaire CarType ici (à faire ultérieurement)
        // Exemple: $form = $this->createForm(CarType::class);

        // Retournez une réponse vide pour l'instant
        return new Response();
    }
}








