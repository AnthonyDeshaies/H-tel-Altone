<?php

namespace App\Entity;

use App\Repository\DishesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DishesRepository::class)
 */
class Dishes
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
    private $nameDish;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionDish;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceDish;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryDishes::class, inversedBy="dishes")
     */
    private $CategoryDishes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDish(): ?string
    {
        return $this->nameDish;
    }

    public function setNameDish(string $nameDish): self
    {
        $this->nameDish = $nameDish;

        return $this;
    }

    public function getDescriptionDish(): ?string
    {
        return $this->descriptionDish;
    }

    public function setDescriptionDish(string $descriptionDish): self
    {
        $this->descriptionDish = $descriptionDish;

        return $this;
    }

    public function getPriceDish(): ?string
    {
        return $this->priceDish;
    }

    public function setPriceDish(string $priceDish): self
    {
        $this->priceDish = $priceDish;

        return $this;
    }

    public function getCategoryDishes(): ?CategoryDishes
    {
        return $this->CategoryDishes;
    }

    public function setCategoryDishes(?CategoryDishes $CategoryDishes): self
    {
        $this->CategoryDishes = $CategoryDishes;

        return $this;
    }
}
