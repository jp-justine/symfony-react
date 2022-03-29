<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use App\Entity\Items;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $firstName;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $lastName;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $mail;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $address;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $phoneNumber;

    
    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull]
    private $birthDate;

    #[ORM\OneToMany(mappedBy: 'itemOwner', targetEntity: Items::class)]
    private $items;


    
    public function __construct()
    {
        $this->itemsOwner = new ArrayCollection();
        $this->ItemsOwner = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return Collection<int, Items>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Items $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setItemOwner($this);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getItemOwner() === $this) {
                $item->setItemOwner(null);
            }
        }

        return $this;
    }

    
}
