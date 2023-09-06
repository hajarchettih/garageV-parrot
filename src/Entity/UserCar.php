<?php

namespace App\Entity;

use App\Repository\UserCarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=UserCarRepository::class)
 */
class UserCar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length=150)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $price = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $year = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $kilometer = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $characteristics = null;

    /**
     * @ORM\Column(length=100)
     */
    private ?string $energy = null;



    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="userCars")
     */
    //private ?Contact $contact = null;
    /**
     * @ORM\Column(length=255, nullable=true)
     * @Vich\UploadableField(mapping="user_car_images", fileNameProperty="photo")
     */
    private ?string $photo = null;

    public function __construct()
    {
       
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(?int $kilometer): self
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getCharacteristics(): ?string
    {
        return $this->characteristics;
    }

    public function setCharacteristics(?string $characteristics): self
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(?string $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getPhoto(): ?string
    {
    return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
    $this->photo = $photo;

    return $this;
    }

}
