<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseursRepository::class)
 */
class Fournisseurs
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
    private $nameFournisseur;

    /**
     * @ORM\Column(type="text")
     */
    private $DescriptionFournisseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgFournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFournisseur(): ?string
    {
        return $this->nameFournisseur;
    }

    public function setNameFournisseur(string $nameFournisseur): self
    {
        $this->nameFournisseur = $nameFournisseur;

        return $this;
    }

    public function getDescriptionFournisseur(): ?string
    {
        return $this->DescriptionFournisseur;
    }

    public function setDescriptionFournisseur(string $DescriptionFournisseur): self
    {
        $this->DescriptionFournisseur = $DescriptionFournisseur;

        return $this;
    }

    public function getImgFournisseur(): ?string
    {
        return $this->imgFournisseur;
    }

    public function setImgFournisseur(string $imgFournisseur): self
    {
        $this->imgFournisseur = $imgFournisseur;

        return $this;
    }
}
