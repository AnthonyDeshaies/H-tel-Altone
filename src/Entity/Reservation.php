<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateStartReservation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEndReservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPeopleReservation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $transportReservation;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRoom::class, inversedBy="reservations")
     */
    private $typeRoom;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $lastName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStartReservation(): ?\DateTimeInterface
    {
        return $this->dateStartReservation;
    }

    public function setDateStartReservation(\DateTimeInterface $dateStartReservation): self
    {
        $this->dateStartReservation = $dateStartReservation;

        return $this;
    }

    public function getDateEndReservation(): ?\DateTimeInterface
    {
        return $this->dateEndReservation;
    }

    public function setDateEndReservation(\DateTimeInterface $dateEndReservation): self
    {
        $this->dateEndReservation = $dateEndReservation;

        return $this;
    }

    public function getNbPeopleReservation(): ?int
    {
        return $this->nbPeopleReservation;
    }

    public function setNbPeopleReservation(int $nbPeopleReservation): self
    {
        $this->nbPeopleReservation = $nbPeopleReservation;

        return $this;
    }

    public function getTransportReservation(): ?bool
    {
        return $this->transportReservation;
    }

    public function setTransportReservation(bool $transportReservation): self
    {
        $this->transportReservation = $transportReservation;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
