<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionRestaurant;

    /**
     * @ORM\OneToMany(targetEntity=Menus::class, mappedBy="restaurant")
     */
    private $Menus;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nameRestaurant;

    /**
     * @ORM\OneToMany(targetEntity=Dishes::class, mappedBy="restaurant")
     */
    private $Dishes;

    /**
     * @ORM\OneToMany(targetEntity=Drinks::class, mappedBy="restaurant")
     */
    private $Drinks;

    public function __construct()
    {
        $this->Menus = new ArrayCollection();
        $this->Dishes = new ArrayCollection();
        $this->Drinks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionRestaurant(): ?string
    {
        return $this->descriptionRestaurant;
    }

    public function setDescriptionRestaurant(string $descriptionRestaurant): self
    {
        $this->descriptionRestaurant = $descriptionRestaurant;

        return $this;
    }

    public function getImgRestaurant(): ?string
    {
        return $this->imgRestaurant;
    }

    public function setImgRestaurant(string $imgRestaurant): self
    {
        $this->imgRestaurant = $imgRestaurant;

        return $this;
    }

    /**
     * @return Collection|Menus[]
     */
    public function getMenus(): Collection
    {
        return $this->Menus;
    }

    public function addMenu(Menus $menu): self
    {
        if (!$this->Menus->contains($menu)) {
            $this->Menus[] = $menu;
            $menu->setRestaurant($this);
        }

        return $this;
    }

    public function removeMenu(Menus $menu): self
    {
        if ($this->Menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getRestaurant() === $this) {
                $menu->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getNameRestaurant(): ?string
    {
        return $this->nameRestaurant;
    }

    public function setNameRestaurant(string $nameRestaurant): self
    {
        $this->nameRestaurant = $nameRestaurant;

        return $this;
    }

    /**
     * @return Collection|Dishes[]
     */
    public function getDishes(): Collection
    {
        return $this->Dishes;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->Dishes->contains($dish)) {
            $this->Dishes[] = $dish;
            $dish->setRestaurant($this);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        if ($this->Dishes->removeElement($dish)) {
            // set the owning side to null (unless already changed)
            if ($dish->getRestaurant() === $this) {
                $dish->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Drinks[]
     */
    public function getDrinks(): Collection
    {
        return $this->Drinks;
    }

    public function addDrink(Drinks $drink): self
    {
        if (!$this->Drinks->contains($drink)) {
            $this->Drinks[] = $drink;
            $drink->setRestaurant($this);
        }

        return $this;
    }

    public function removeDrink(Drinks $drink): self
    {
        if ($this->Drinks->removeElement($drink)) {
            // set the owning side to null (unless already changed)
            if ($drink->getRestaurant() === $this) {
                $drink->setRestaurant(null);
            }
        }

        return $this;
    }
}
