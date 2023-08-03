<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Attributs pour stocker les horaires, l'adresse, le numéro de téléphone et l'email
    private ?array $horaires = [];
    private ?string $telephone = '';
    private ?string $adresse = '';
    private ?string $email = '';

    // Getters and setters for each property
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraires(): ?array
    {
        return $this->horaires;
    }

    public function setHoraires(?array $horaires): void
    {
        $this->horaires = $horaires;
    }

    public function getTelephone(): ?string
    {
        // Retourner une valeur par défaut si le téléphone est vide
        return $this->telephone ?: 'Aucun numéro de téléphone';
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getAdresse(): ?string
    {
        // Retourner une valeur par défaut si l'adresse est vide
        return $this->adresse ?: 'Aucune adresse';
    }

    public function setAdresse(?string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getEmail(): ?string
    {
        // Retourner une valeur par défaut si l'email est vide
        return $this->email ?: 'Aucun email';
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
