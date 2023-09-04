<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserCrudController extends AbstractCrudController
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }
   
    public function createUser(): Response
    {
        return $this->redirectToRoute('app_dashboard');
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $user = $this->getUser();
        $userId = $user->getId();
    
        $response = $this->entityManager->createQueryBuilder()
            ->select('u') 
            ->from(User::class, 'u'); 
    
        // Exclure l'utilisateur actuel de la liste
        $response->andWhere('u.id != :userId')
            ->setParameter('userId', $userId);
    
        return $response;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Email'),
            TextField::new('password', 'Mot de passe')->onlyOnForms()
                ->setFormType(PasswordType::class),
            ChoiceField::new('roles', 'Rôle à attribuer')
                ->allowMultipleChoices()
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_USER'
                ]),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var SymfonyUser $user */ // Utilisez SymfonyUser
        $user = $entityInstance;
    
        
        $plainPassword = $user->getPassword();
    
        if ($plainPassword !== null) {
            
            $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
        }

        $roles = $user->getRoles();
        $user->setRoles($roles);
    

        parent::persistEntity($entityManager, $user);
    }

    #[Route('/admin/listUsersWithRoleUser', name: 'admin_list_users_with_role_user')]
    public function listUsersWithRoleUser(EntityManagerInterface $entityManager): Response
    {
        $userRepository = $entityManager->getRepository(User::class);
        $queryBuilder = $userRepository->createQueryBuilder('u');

        $queryBuilder->andWhere(':role MEMBER OF u.roles')
            ->setParameter('role', 'ROLE_USER');

        $users = $queryBuilder->getQuery()->getResult();

        return $this->render('admin/user/list_users_with_role_user.html.twig', [
            'users' => $users,
        ]);
    }
}


