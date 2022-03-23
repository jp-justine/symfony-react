<?php

namespace App\Entity;

use App\Repository\UsersRepository;
// use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
// use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * a user.
 *
 */
#[ORM\Entity(repositoryClass: UsersRepository::class)]
// #[ApiResource]
class Users
{
    /**
     *  user id.
     *
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     *  frst name of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $firstName;

    /**
     *   last name of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $lastName;

    /**
     *  email of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $mail;

    /**
     * address of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $address;

    /**
     *  phone number of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $phoneNumber;

    /**
     * bitrhday of the user.
     *
     */
    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull]
    private $birthDate;

    // // /**
    // //  *  items owned by this user.
    // //  *
    // //  */
    // // #[ORM\OneToMany(mappedBy: 'Users', targetEntity: Items::class)]
    // // private $ItemsOwner;

    // public function __construct()
    // {
    //     $this->itemsOwner = new ArrayCollection();
    //     $this->ItemsOwner = new ArrayCollection();
    // }

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

    // /**
    //  * @return Collection<int, Items>
    //  */
    // public function getItemsOwner(): Collection
    // {
    //     return $this->ItemsOwner;
    // }

    // public function addItemsOwner(Items $itemsOwner): self
    // {
    //     if (!$this->ItemsOwner->contains($itemsOwner)) {
    //         $this->ItemsOwner[] = $itemsOwner;
    //         $itemsOwner->setUser($this);
    //     }

    //     return $this;
    // }

    // public function removeItemsOwner(Items $itemsOwner): self
    // {
    //     if ($this->ItemsOwner->removeElement($itemsOwner)) {
    //         // set the owning side to null (unless already changed)
    //         if ($itemsOwner->getUser() === $this) {
    //             $itemsOwner->setUser(null);
    //         }
    //     }

    //     return $this;
    // }


}
