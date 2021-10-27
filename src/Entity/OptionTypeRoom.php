<?php

namespace App\Entity;

use App\Repository\OptionTypeRoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionTypeRoomRepository::class)
 */
class OptionTypeRoom
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
    private $nameOptionTypeRoom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoOptionTypeRoom;

    /**
     * @ORM\ManyToMany(targetEntity=TypeRoom::class, mappedBy="optionTypeRoom")
     */
    private $typeRooms;

    public function __construct()
    {
        $this->typeRooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameOptionTypeRoom(): ?string
    {
        return $this->nameOptionTypeRoom;
    }

    public function setNameOptionTypeRoom(string $nameOptionTypeRoom): self
    {
        $this->nameOptionTypeRoom = $nameOptionTypeRoom;

        return $this;
    }

    public function getLogoOptionTypeRoom(): ?string
    {
        return $this->logoOptionTypeRoom;
    }

    public function setLogoOptionTypeRoom(string $logoOptionTypeRoom): self
    {
        $this->logoOptionTypeRoom = $logoOptionTypeRoom;

        return $this;
    }

    /**
     * @return Collection|TypeRoom[]
     */
    public function getTypeRooms(): Collection
    {
        return $this->typeRooms;
    }

    public function addTypeRoom(TypeRoom $typeRoom): self
    {
        if (!$this->typeRooms->contains($typeRoom)) {
            $this->typeRooms[] = $typeRoom;
            $typeRoom->addOptionTypeRoom($this);
        }

        return $this;
    }

    public function removeTypeRoom(TypeRoom $typeRoom): self
    {
        if ($this->typeRooms->removeElement($typeRoom)) {
            $typeRoom->removeOptionTypeRoom($this);
        }

        return $this;
    }
}
