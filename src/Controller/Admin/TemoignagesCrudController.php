<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use App\Entity\Temoignages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TemoignagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignages::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    public function configureFields(string $pageName): iterable
    {
        yield    TextField::new('name', 'Nom');
        yield    TextareaField::new('content', 'Contenue');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Temoignages');
    }
}