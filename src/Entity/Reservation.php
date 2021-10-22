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
}
