<?php

namespace App\Entity;

use App\Repository\AmenitiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AmenitiesRepository::class)
 */
class Amenities
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $nameAmenity;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionAmenity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgAmenity;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $priceAmenity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAmenity(): ?string
    {
        return $this->nameAmenity;
    }

    public function setNameAmenity(string $nameAmenity): self
    {
        $this->nameAmenity = $nameAmenity;

        return $this;
    }

    public function getDescriptionAmenity(): ?string
    {
        return $this->descriptionAmenity;
    }

    public function setDescriptionAmenity(?string $descriptionAmenity): self
    {
        $this->descriptionAmenity = $descriptionAmenity;

        return $this;
    }

    public function getImgAmenity(): ?string
    {
        return $this->imgAmenity;
    }

    public function setImgAmenity(?string $imgAmenity): self
    {
        $this->imgAmenity = $imgAmenity;

        return $this;
    }

    public function getPriceAmenity(): ?string
    {
        return $this->priceAmenity;
    }

    public function setPriceAmenity(string $priceAmenity): self
    {
        $this->priceAmenity = $priceAmenity;

        return $this;
    }
}
