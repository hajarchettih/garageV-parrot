<?php

namespace App\Controller\Admin;

use App\Entity\Adresse;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdresseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adresse::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    public function configureFields(string $pageName): iterable
    {
        yield    TextField::new('street', 'Rue');
        yield    TextField::new('city', 'Ville');
        yield    TextField::new('zipCode', 'Code postal');
        yield    TextField::new('phoneNumber', 'Numéro de téléphone');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une adresse')
            ->setPageTitle('index', 'Adresse du garage')
            ->setPaginatorPageSize(5);
    }
}