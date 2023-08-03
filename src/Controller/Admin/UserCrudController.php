<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::EDIT);
    }

    public function configureFields(string $pageName): iterable
    {
        yield EmailField::new('mail', 'Email');
        yield TextField::new('plainPassword', 'Password')->hideOnForm();
        yield ChoiceField::new('roles', 'Rôle à attribuer')
            ->allowMultipleChoices()
            ->setChoices([
                'Administrateur' => 'ROLE_ADMIN',
                'Utilisateur' => 'ROLE_USER'
            ])
            ->setFormTypeOption('multiple', true)
            ->setFormTypeOption('expanded', true)
            ->setRequired(true)
            ->hideOnIndex();
    }
}
