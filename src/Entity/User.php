<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: "json")]
    private array $roles = ['ROLE_USER'];

    #[ORM\Column(type: "string", nullable: true)]
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

    public function setPassword(string $hashedPassword): void
    {
    $this->password = $hashedPassword;
    }


    public function getRoles(): array
    {
       
        return $this->roles ?: ['ROLE_USER'];
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

     /**
     * @ORM\Transient
     */

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function getSalt()
    {

    }

    public function eraseCredentials()
    {
       
        $this->plainPassword = null;
    }

    public function updatePasswordHash(UserPasswordHasherInterface $passwordHasher): void
    {
        $hashedPassword = $passwordHasher->hashPassword($this, $this->plainPassword);
        $this->setPassword($hashedPassword);
        $this->eraseCredentials();
    }
    
    
   
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

}