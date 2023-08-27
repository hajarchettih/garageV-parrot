<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
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

    #[Route('/create-user', name: 'create_user')]
    public function createUser(): Response
    {
        // Créez une nouvelle instance de l'entité User
        $user = new User();

        // Définissez les propriétés de l'utilisateur, y compris le mot de passe en clair
        $user->setEmail('toto@free.fr');
        $plainPassword = 'azerty';

        // Utilisez UserPasswordHasherInterface pour hacher le mot de passe
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        // Enregistrez l'utilisateur dans la base de données
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Redirigez vers la page de connexion ou une autre page appropriée
        // ...

        // Retournez une réponse pour indiquer que l'utilisateur a été créé avec succès
        return new Response('Utilisateur créé avec succès !');
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $user = $this->getUser();

        if ($user instanceof User) {
            $userId = $user->getId();
            $response = $this->entityManager->createQueryBuilder()
            ->select('u') // Sélectionnez l'alias 'u' pour l'entité User
            ->from(User::class, 'u'); // Utilisez l'alias 'u' pour l'entité User
        

            return $response;
        } else {
            // Handle the case where no user is logged in
            // You might want to return a different query or handle this differently
        }
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
        /** @var User $user */
        $user = $entityInstance;

        // Récupérez le mot de passe en clair
        $plainPassword = $user->getPlainPassword();

        if ($plainPassword !== null) {
            // Mettez à jour le mot de passe haché
            $user->updatePasswordHash($this->passwordHasher);
        }

        // Enregistrez les rôles dans l'entité User
        $roles = $user->getRoles();
        $user->setRoles($roles);

        // Appelez la méthode parente pour effectuer la persistance
        parent::persistEntity($entityManager, $user);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un utilisateur')
            ->setPageTitle('index', 'Utilisateurs')
            ->setPaginatorPageSize(10);
    }

    #[Route('/admin/listUsersWithRoleUser', name: 'admin_list_users_with_role_user')]
    public function listUsersWithRoleUser(EntityManagerInterface $entityManager): Response
    {
        // Utilisez le Repository de l'entité User pour créer votre requête
        $userRepository = $entityManager->getRepository(User::class);
        
        // Utilisez la méthode `createQueryBuilder` du Repository pour créer votre requête DQL
        $queryBuilder = $userRepository->createQueryBuilder('u');
    
        // Ajoutez une condition WHERE pour filtrer les utilisateurs ayant le rôle "ROLE_USER"
        $queryBuilder->andWhere(':role MEMBER OF u.roles')
             ->setParameter('role', 'ROLE_USER');
    
        // Exécutez la requête pour obtenir les utilisateurs correspondants
        $users = $queryBuilder->getQuery()->getResult();
    
        return $this->render('admin/user/list_users_with_role_user.html.twig', [
            'users' => $users,
        ]);
    }
    
}