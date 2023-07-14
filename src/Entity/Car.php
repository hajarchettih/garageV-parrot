<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 255)]
    private ?string $fuel = null;

    #[ORM\Column]
    private ?int $kilometer = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $details = null;

    #[ORM\Column(length: 255)]
    private ?string $carbody = null;

    #[ORM\Column(length: 255)]
    private ?string $exteriorcolor = null;

    #[ORM\Column(length: 255)]
    private ?string $interiorcolor = null;

    #[ORM\Column(length: 255)]
    private ?string $typeengine = null;

    #[ORM\Column(length: 255)]
    private ?string $displacement = null;

    #[ORM\Column(length: 255)]
    private ?string $power = null;

    #[ORM\Column(length: 255)]
    private ?string $gearbox = null;

    #[ORM\Column]
    private ?int $speed = null;

    #[ORM\Column]
    private ?bool $airconditioner = null;

    #[ORM\Column(length: 255)]
    private ?string $audiosystem = null;

    #[ORM\Column(length: 255)]
    private ?string $navigationsystem = null;

    #[ORM\Column]
    private ?int $seating = null;

    #[ORM\Column(length: 255)]
    private ?string $security = null;

    #[ORM\Column(length: 255)]
    private ?string $other = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\Column(length: 255)]
    private ?string $maintenancehistory = null;

    #[ORM\Column(length: 255)]
    private ?string $tires = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): static
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): static
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getCarbody(): ?string
    {
        return $this->carbody;
    }

    public function setCarbody(string $carbody): static
    {
        $this->carbody = $carbody;

        return $this;
    }

    public function getExteriorcolor(): ?string
    {
        return $this->exteriorcolor;
    }

    public function setExteriorcolor(string $exteriorcolor): static
    {
        $this->exteriorcolor = $exteriorcolor;

        return $this;
    }

    public function getInteriorcolor(): ?string
    {
        return $this->interiorcolor;
    }

    public function setInteriorcolor(string $interiorcolor): static
    {
        $this->interiorcolor = $interiorcolor;

        return $this;
    }

    public function getTypeengine(): ?string
    {
        return $this->typeengine;
    }

    public function setTypeengine(string $typeengine): static
    {
        $this->typeengine = $typeengine;

        return $this;
    }

    public function getDisplacement(): ?string
    {
        return $this->displacement;
    }

    public function setDisplacement(string $displacement): static
    {
        $this->displacement = $displacement;

        return $this;
    }

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(string $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function isAirconditioner(): ?bool
    {
        return $this->airconditioner;
    }

    public function setAirconditioner(bool $airconditioner): static
    {
        $this->airconditioner = $airconditioner;

        return $this;
    }

    public function getAudiosystem(): ?string
    {
        return $this->audiosystem;
    }

    public function setAudiosystem(string $audiosystem): static
    {
        $this->audiosystem = $audiosystem;

        return $this;
    }

    public function getNavigationsystem(): ?string
    {
        return $this->navigationsystem;
    }

    public function setNavigationsystem(string $navigationsystem): static
    {
        $this->navigationsystem = $navigationsystem;

        return $this;
    }

    public function getSeating(): ?int
    {
        return $this->seating;
    }

    public function setSeating(int $seating): static
    {
        $this->seating = $seating;

        return $this;
    }

    public function getSecurity(): ?string
    {
        return $this->security;
    }

    public function setSecurity(string $security): static
    {
        $this->security = $security;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(string $other): static
    {
        $this->other = $other;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getMaintenancehistory(): ?string
    {
        return $this->maintenancehistory;
    }

    public function setMaintenancehistory(string $maintenancehistory): static
    {
        $this->maintenancehistory = $maintenancehistory;

        return $this;
    }

    public function getTires(): ?string
    {
        return $this->tires;
    }

    public function setTires(string $tires): static
    {
        $this->tires = $tires;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }
}
