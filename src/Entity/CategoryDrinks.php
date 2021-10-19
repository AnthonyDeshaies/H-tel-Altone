<?php

namespace App\Entity;

use App\Repository\CategoryDrinksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryDrinksRepository::class)
 */
class CategoryDrinks
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
    private $nameCategory;

    /**
     * @ORM\OneToMany(targetEntity=Drinks::class, mappedBy="categoryDrinks")
     */
    private $drinks;

    public function __construct()
    {
        $this->drinks = new ArrayCollection();
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
     * @return Collection|Drinks[]
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(Drinks $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
            $drink->setCategoryDrinks($this);
        }

        return $this;
    }

    public function removeDrink(Drinks $drink): self
    {
        if ($this->drinks->removeElement($drink)) {
            // set the owning side to null (unless already changed)
            if ($drink->getCategoryDrinks() === $this) {
                $drink->setCategoryDrinks(null);
            }
        }

        return $this;
    }
}
