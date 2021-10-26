<?php

namespace App\Entity;

use App\Repository\RoomsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomsRepository::class)
 */
class Rooms
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nameRoom;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $priceRoom;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $viewRoom;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRoom::class, inversedBy="rooms")
     */
    private $typeRoom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRoom(): ?string
    {
        return $this->nameRoom;
    }

    public function setNameRoom(string $nameRoom): self
    {
        $this->nameRoom = $nameRoom;

        return $this;
    }

    public function getPriceRoom(): ?string
    {
        return $this->priceRoom;
    }

    public function setPriceRoom(string $priceRoom): self
    {
        $this->priceRoom = $priceRoom;

        return $this;
    }

    public function getViewRoom(): ?string
    {
        return $this->viewRoom;
    }

    public function setViewRoom(?string $viewRoom): self
    {
        $this->viewRoom = $viewRoom;

        return $this;
    }

    public function getTypeRoom(): ?TypeRoom
    {
        return $this->typeRoom;
    }

    public function setTypeRoom(?TypeRoom $typeRoom): self
    {
        $this->typeRoom = $typeRoom;

        return $this;
    }
}
