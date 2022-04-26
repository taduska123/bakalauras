<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
#[ORM\Table("location")]
#[ORM\HasLifecycleCallbacks()]
class Location
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $coordinateX;

    #[ORM\Column(type: 'float')]
    private $coordinateY;

    #[ORM\ManyToOne(targetEntity: Bouy::class, inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private $bouy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoordinateX(): ?float
    {
        return $this->coordinateX;
    }

    public function setCoordinateX(float $coordinateX): self
    {
        $this->coordinateX = $coordinateX;

        return $this;
    }

    public function getCoordinateY(): ?float
    {
        return $this->coordinateY;
    }

    public function setCoordinateY(float $coordinateY): self
    {
        $this->coordinateY = $coordinateY;

        return $this;
    }

    public function getBouy(): ?Bouy
    {
        return $this->bouy;
    }

    public function setBouy(?Bouy $bouy): self
    {
        $this->bouy = $bouy;

        return $this;
    }
}
