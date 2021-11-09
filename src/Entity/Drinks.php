<?php

namespace App\Entity;

use App\Repository\DrinksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrinksRepository::class)
 */
class Drinks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nameDrink;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $detailDrink;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $priceDrink;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryDrinks::class, inversedBy="drinks")
     */
    private $categoryDrinks;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="Drinks")
     */
    private $restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDrink(): ?string
    {
        return $this->nameDrink;
    }

    public function setNameDrink(string $nameDrink): self
    {
        $this->nameDrink = $nameDrink;

        return $this;
    }

    public function getDetailDrink(): ?string
    {
        return $this->detailDrink;
    }

    public function setDetailDrink(?string $detailDrink): self
    {
        $this->detailDrink = $detailDrink;

        return $this;
    }

    public function getPriceDrink(): ?string
    {
        return $this->priceDrink;
    }

    public function setPriceDrink(string $priceDrink): self
    {
        $this->priceDrink = $priceDrink;

        return $this;
    }

    public function getCategoryDrinks(): ?CategoryDrinks
    {
        return $this->categoryDrinks;
    }

    public function setCategoryDrinks(?CategoryDrinks $categoryDrinks): self
    {
        $this->categoryDrinks = $categoryDrinks;

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
