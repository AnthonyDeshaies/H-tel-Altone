<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 */
class Contacts
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
    private $nameContact;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $firstNameContact;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mailContact;

    /**
     * @ORM\Column(type="text")
     */
    private $textContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): self
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getFirstNameContact(): ?string
    {
        return $this->firstNameContact;
    }

    public function setFirstNameContact(string $firstNameContact): self
    {
        $this->firstNameContact = $firstNameContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(string $mailContact): self
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getTextContact(): ?string
    {
        return $this->textContact;
    }

    public function setTextContact(string $textContact): self
    {
        $this->textContact = $textContact;

        return $this;
    }
}
