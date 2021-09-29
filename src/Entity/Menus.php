<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenusRepository::class)
 */
class Menus
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
    private $nameMenu;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceMenu;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionMenu;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="Menus")
     */
    private $restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMenu(): ?string
    {
        return $this->nameMenu;
    }

    public function setNameMenu(string $nameMenu): self
    {
        $this->nameMenu = $nameMenu;

        return $this;
    }

    public function getPriceMenu(): ?string
    {
        return $this->priceMenu;
    }

    public function setPriceMenu(string $priceMenu): self
    {
        $this->priceMenu = $priceMenu;

        return $this;
    }

    public function getDescriptionMenu(): ?string
    {
        return $this->descriptionMenu;
    }

    public function setDescriptionMenu(string $descriptionMenu): self
    {
        $this->descriptionMenu = $descriptionMenu;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
