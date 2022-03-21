<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * a user.
 *
 */
#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ApiResource]
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
    private $firstName;

    /**
     *   last name of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $lastName;

    /**
     *  email of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $mail;

    /**
     * address of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    /**
     *  phone number of the user.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $phoneNumber;

    /**
     * bitrhday of the user.
     *
     */
    #[ORM\Column(type: "datetime")]
    private $birthDate;

    /**
     *  owned objects for this user.
     *
     */
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UsersOwned::class)]
    private $usersOwneds;

    public function __construct()
    {
        $this->usersOwneds = new ArrayCollection();
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
     * @return Collection<int, UsersOwned>
     */
    public function getUsersOwneds(): Collection
    {
        return $this->usersOwneds;
    }

    public function addUsersOwned(UsersOwned $usersOwned): self
    {
        if (!$this->usersOwneds->contains($usersOwned)) {
            $this->usersOwneds[] = $usersOwned;
            $usersOwned->setUser($this);
        }

        return $this;
    }

    public function removeUsersOwned(UsersOwned $usersOwned): self
    {
        if ($this->usersOwneds->removeElement($usersOwned)) {
            // set the owning side to null (unless already changed)
            if ($usersOwned->getUser() === $this) {
                $usersOwned->setUser(null);
            }
        }

        return $this;
    }
}
