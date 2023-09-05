<?php

namespace App\Controller\Admin;

use App\Entity\UserCar;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserCar::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        yield   TextField::new('name', 'Nom du véhicule');
        yield   IntegerField::new('price', 'Prix');
        yield   IntegerField::new('year', 'Année');
        yield   IntegerField::new('kilometer', 'Nombre de km');
        yield   ChoiceField::new('energy', 'Energy')
            ->setChoices([
                'Essence' => 'Essence',
                'Diesel' => 'Diesel',
                'Hybrid' => 'Hybrid',
                'Electrique' => 'Electrique'
            ]);

        $characteristics = '**Pour faire un retour à la ligne ";" et pour mettre en gras, mettez des "{}" ';

        yield TextareaField::new('characteristics', 'Caractéristiques')
            ->setHelp("<strong><u>$characteristics</u></strong>");

        yield CollectionField::new('images')
            ->setEntryType(UserCarImageType::class);

        yield ImageField::new('photo')
            ->setBasePath('uploads/images')
            ->setUploadDir('public/uploads/images')
            ->setSortable(false);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un nouveau véhicule d\'occasion')
            ->setPageTitle('index', 'Voitures d\'occasion')
            ->setPaginatorPageSize(15);
    }
}
