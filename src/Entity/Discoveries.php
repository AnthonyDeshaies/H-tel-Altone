<?php

namespace App\Entity;

use App\Repository\DiscoveriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscoveriesRepository::class)
 */
class Discoveries
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nameDiscovery;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptiondiscovery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgDiscovery;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cityDiscovery;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $latitudeDiscovery;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $longitudeDiscovery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDiscovery(): ?string
    {
        return $this->nameDiscovery;
    }

    public function setNameDiscovery(string $nameDiscovery): self
    {
        $this->nameDiscovery = $nameDiscovery;

        return $this;
    }

    public function getDescriptiondiscovery(): ?string
    {
        return $this->descriptiondiscovery;
    }

    public function setDescriptiondiscovery(?string $descriptiondiscovery): self
    {
        $this->descriptiondiscovery = $descriptiondiscovery;

        return $this;
    }

    public function getImgDiscovery(): ?string
    {
        return $this->imgDiscovery;
    }

    public function setImgDiscovery(?string $imgDiscovery): self
    {
        $this->imgDiscovery = $imgDiscovery;

        return $this;
    }

    public function getCityDiscovery(): ?string
    {
        return $this->cityDiscovery;
    }

    public function setCityDiscovery(string $cityDiscovery): self
    {
        $this->cityDiscovery = $cityDiscovery;

        return $this;
    }

    public function getLatitudeDiscovery(): ?string
    {
        return $this->latitudeDiscovery;
    }

    public function setLatitudeDiscovery(string $latitudeDiscovery): self
    {
        $this->latitudeDiscovery = $latitudeDiscovery;

        return $this;
    }

    public function getLongitudeDiscovery(): ?string
    {
        return $this->longitudeDiscovery;
    }

    public function setLongitudeDiscovery(string $longitudeDiscovery): self
    {
        $this->longitudeDiscovery = $longitudeDiscovery;

        return $this;
    }
}
