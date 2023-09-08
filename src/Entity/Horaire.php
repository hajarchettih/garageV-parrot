<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="horaire")
 * @ORM\Entity(repositoryClass=HoraireRepository::class)
 */
class Horaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="days", type="string", length=50, nullable=true)
     */
    private ?string $days = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="open", type="string", length=100, nullable=true)
     */
    private ?string $open = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(?string $days): self
    {
        $this->days = $days;

        return $this;
    }

    public function getOpen(): ?string
    {
        return $this->open;
    }

    public function setOpen(?string $open): self
    {
        $this->open = $open;

        return $this;
    }
}

