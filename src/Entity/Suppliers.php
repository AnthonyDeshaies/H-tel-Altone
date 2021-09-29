<?php

namespace App\Entity;

use App\Repository\SuppliersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuppliersRepository::class)
 */
class Suppliers
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
    private $nameSupplier;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionSupplier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgSupplier;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $adressSupplier;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $cpSupplier;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $citySupplier;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $phoneSupplier;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $mailSupplier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSupplier(): ?string
    {
        return $this->nameSupplier;
    }

    public function setNameSupplier(string $nameSupplier): self
    {
        $this->nameSupplier = $nameSupplier;

        return $this;
    }

    public function getDescriptionSupplier(): ?string
    {
        return $this->descriptionSupplier;
    }

    public function setDescriptionSupplier(string $descriptionSupplier): self
    {
        $this->descriptionSupplier = $descriptionSupplier;

        return $this;
    }

    public function getImgSupplier(): ?string
    {
        return $this->imgSupplier;
    }

    public function setImgSupplier(string $imgSupplier): self
    {
        $this->imgSupplier = $imgSupplier;

        return $this;
    }

    public function getAdressSupplier(): ?string
    {
        return $this->adressSupplier;
    }

    public function setAdressSupplier(string $adressSupplier): self
    {
        $this->adressSupplier = $adressSupplier;

        return $this;
    }

    public function getCpSupplier(): ?string
    {
        return $this->cpSupplier;
    }

    public function setCpSupplier(string $cpSupplier): self
    {
        $this->cpSupplier = $cpSupplier;

        return $this;
    }

    public function getCitySupplier(): ?string
    {
        return $this->citySupplier;
    }

    public function setCitySupplier(string $citySupplier): self
    {
        $this->citySupplier = $citySupplier;

        return $this;
    }

    public function getPhoneSupplier(): ?string
    {
        return $this->phoneSupplier;
    }

    public function setPhoneSupplier(?string $phoneSupplier): self
    {
        $this->phoneSupplier = $phoneSupplier;

        return $this;
    }

    public function getMailSupplier(): ?string
    {
        return $this->mailSupplier;
    }

    public function setMailSupplier(?string $mailSupplier): self
    {
        $this->mailSupplier = $mailSupplier;

        return $this;
    }
}
