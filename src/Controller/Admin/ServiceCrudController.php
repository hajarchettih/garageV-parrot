<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }
    public function configureFields(string $pageName): iterable
    {
        
        yield    TextField::new('name', 'Nom du service');
        yield    TextareaField::new('content', 'Contenu du service');
        
    }
    
}
