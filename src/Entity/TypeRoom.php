<?php

namespace App\Entity;

use App\Entity\Rooms;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TypeRoomRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TypeRoomRepository::class)
 */
class TypeRoom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $nameType;

    /**
     * @ORM\OneToMany(targetEntity=Rooms::class, mappedBy="typeRoom")
     */
    private $rooms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgType1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgType2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgType3;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionTypeRoom;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="typeRoom")
     */
    private $reservations;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameType(): ?string
    {
        return $this->nameType;
    }

    public function setNameType(string $nameType): self
    {
        $this->nameType = $nameType;

        return $this;
    }

    /**
     * @return Collection|Rooms[]
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Rooms $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
            $room->setTypeRoom($this);
        }

        return $this;
    }

    public function removeRoom(Rooms $room): self
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getTypeRoom() === $this) {
                $room->setTypeRoom(null);
            }
        }

        return $this;
    }

    public function getImgType1(): ?string
    {
        return $this->imgType1;
    }

    public function setImgType1(string $imgType1): self
    {
        $this->imgType1 = $imgType1;

        return $this;
    }

    public function getImgType2(): ?string
    {
        return $this->imgType2;
    }

    public function setImgType2(string $imgType2): self
    {
        $this->imgType2 = $imgType2;

        return $this;
    }

    public function getImgType3(): ?string
    {
        return $this->imgType3;
    }

    public function setImgType3(string $imgType3): self
    {
        $this->imgType3 = $imgType3;

        return $this;
    }

    public function getDescriptionTypeRoom(): ?string
    {
        return $this->descriptionTypeRoom;
    }

    public function setDescriptionTypeRoom(string $descriptionTypeRoom): self
    {
        $this->descriptionTypeRoom = $descriptionTypeRoom;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setTypeRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTypeRoom() === $this) {
                $reservation->setTypeRoom(null);
            }
        }

        return $this;
    }
}
