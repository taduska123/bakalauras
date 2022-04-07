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
    private $coordinate_x;

    #[ORM\Column(type: 'float')]
    private $coordinate_y;

    #[ORM\ManyToOne(targetEntity: Bouy::class, inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private $bouy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoordinateX(): ?float
    {
        return $this->coordinate_x;
    }

    public function setCoordinateX(float $coordinate_x): self
    {
        $this->coordinate_x = $coordinate_x;

        return $this;
    }

    public function getCoordinateY(): ?float
    {
        return $this->coordinate_y;
    }

    public function setCoordinateY(float $coordinate_y): self
    {
        $this->coordinate_y = $coordinate_y;

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
