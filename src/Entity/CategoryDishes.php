<?php

namespace App\Entity;

use App\Repository\CategoryDishesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryDishesRepository::class)
 */
class CategoryDishes
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
    private $nameCategory;

    /**
     * @ORM\OneToMany(targetEntity=Dishes::class, mappedBy="CategoryDishes")
     */
    private $dishes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgCategoryDishes;

    public function __construct()
    {
        $this->dishes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCategory(): ?string
    {
        return $this->nameCategory;
    }

    public function setNameCategory(string $nameCategory): self
    {
        $this->nameCategory = $nameCategory;

        return $this;
    }

    /**
     * @return Collection|Dishes[]
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes[] = $dish;
            $dish->setCategoryDishes($this);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        if ($this->dishes->removeElement($dish)) {
            // set the owning side to null (unless already changed)
            if ($dish->getCategoryDishes() === $this) {
                $dish->setCategoryDishes(null);
            }
        }

        return $this;
    }

    public function getImgCategoryDishes(): ?string
    {
        return $this->imgCategoryDishes;
    }

    public function setImgCategoryDishes(string $imgCategoryDishes): self
    {
        $this->imgCategoryDishes = $imgCategoryDishes;

        return $this;
    }
}
