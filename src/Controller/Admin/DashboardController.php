<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Horaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
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
            ->setTitle('Panel Administrateur');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Page du site', 'fa fa-home', '/');

        yield MenuItem::subMenu('Service', 'fa-solid fa-gears')->setSubItems([
            MenuItem::linkToCrud('Crée un service', 'fas fa-plus', Service::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des services', 'fas fa-eye', Service::class)
        ]);

        yield MenuItem::subMenu('Infos pratiques', 'fas fa-clock')->setSubItems([
            MenuItem::linkToCrud('Modifier horaire et adresse', 'fas fa-edit', Horaire::class)->setAction(Crud::PAGE_DETAIL)
        ]);

        yield MenuItem::linkToCrud('Créer un employé', 'fa fa-plus', User::class)
            ->setAction('new')
            ->setCssClass('action-new');

        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class)
            ->setAction(Crud::PAGE_INDEX);
    }
}






