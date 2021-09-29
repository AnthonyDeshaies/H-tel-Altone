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
     * @ORM\Column(type="string", length=255)
     */
    private $imgRestaurant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgStarter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgMainCourse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgDessert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgDrink;

    /**
     * @ORM\OneToMany(targetEntity=Menus::class, mappedBy="restaurant")
     */
    private $Menus;

    public function __construct()
    {
        $this->Menus = new ArrayCollection();
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

    public function getImgStarter(): ?string
    {
        return $this->imgStarter;
    }

    public function setImgStarter(string $imgStarter): self
    {
        $this->imgStarter = $imgStarter;

        return $this;
    }

    public function getImgMainCourse(): ?string
    {
        return $this->imgMainCourse;
    }

    public function setImgMainCourse(string $imgMainCourse): self
    {
        $this->imgMainCourse = $imgMainCourse;

        return $this;
    }

    public function getImgDessert(): ?string
    {
        return $this->imgDessert;
    }

    public function setImgDessert(string $imgDessert): self
    {
        $this->imgDessert = $imgDessert;

        return $this;
    }

    public function getImgDrink(): ?string
    {
        return $this->imgDrink;
    }

    public function setImgDrink(string $imgDrink): self
    {
        $this->imgDrink = $imgDrink;

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
}
