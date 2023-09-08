<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Adresse;
use App\Entity\Horaire;
use App\Entity\Temoignages;
use App\Entity\UserCar;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $AdminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->AdminUrlGenerator
            ->setController(ServiceCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord');
    }

    public function configureMenuItems(): iterable

    {
        yield MenuItem::linkToUrl('Page du site', 'fa fa-home', '/');

        yield MenuItem::subMenu('Témoignages', 'fas fa-comments')->setSubItems([
            MenuItem::linkToCrud('Créer un nouveau témoignage', 'fas fa-comments', Temoignages::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçue des témoignages', 'fas fa-eye', Temoignages::class)
        ]);

        
        yield MenuItem::subMenu('Service', 'fa-solid fa-gears')->setSubItems([
            MenuItem::linkToCrud('Crée un service', 'fas fa-plus', Service::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des services', 'fas fa-eye', Service::class)
        ]);

        
        if ($this->isGranted('ROLE_ADMIN')) {
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class)
            ->setAction(Crud::PAGE_INDEX);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
        yield MenuItem::subMenu('Annonce', 'fas fa-car')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle annonce', 'fas fa-car', UserCar::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des annonces', 'fas fa-eye', UserCar::class)
 
         ]);

         if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Infos pratiques', 'fas fa-door-open')->setSubItems([
                MenuItem::linkToCrud('Modifier les horaires', 'fas fa-door-open', Horaire::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des horaires', 'fas fa-eye', Horaire::class)
            ]);
        
    }
    if ($this->isGranted('ROLE_ADMIN')) {
        yield MenuItem::subMenu('Adresse', 'fas fa-location-dot')->setSubItems([
            MenuItem::linkToCrud('Coordonnée du garage', 'fas fa-location-dot', Adresse::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des coordonnées', 'fas fa-eye', Adresse::class)
        ]);
    }
}

}
}