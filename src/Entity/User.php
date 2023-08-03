<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: "json")]
    private array $roles = ['ROLE_USER'];

    #[Assert\NotBlank(message: "Le mot de passe ne peut pas être vide.")]
    private ?string $plainPassword = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoles(): array
    {
        // Assurez-vous que la propriété $roles est toujours initialisée avec au moins le rôle "ROLE_USER"
        return empty($this->roles) ? ['ROLE_USER'] : $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function getSalt()
    {
        // Cette méthode est nécessaire en raison de l'implémentation de l'interface, mais inutile dans notre cas car nous utilisons Bcrypt pour le hachage.
    }

    public function eraseCredentials()
    {
        // Efface le mot de passe en clair après qu'il a été utilisé pour mettre à jour le mot de passe haché.
        $this->plainPassword = null;
    }
    
    public function updatePasswordHash(): void
    {
        if ($this->plainPassword !== null) {
            $this->setPassword(password_hash($this->plainPassword, PASSWORD_BCRYPT));
            $this->eraseCredentials();
        }
    }

    // Méthode pour récupérer l'identifiant de l'utilisateur (nouvelle méthode ajoutée pour Symfony 5.3+)
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
}

