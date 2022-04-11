<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("read")]
    private $id;

    #[ORM\Column(type: 'string', length: 40)]
    #[Groups("read")]
    private $name;

    #[ORM\Column(type: 'string', length: 40)]
    #[Groups("read")]
    private $mail;

    #[ORM\Column(type: 'string', length: 40)]
    #[Groups("read")]
    private $address;

    #[ORM\Column(type: 'string', length: 40)]
    #[Groups("read")]
    private $phone;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Articles::class, orphanRemoval:true)]
    #[Groups("read")]
    private $articles;

    #[ORM\Column(type: 'datetime')]
    #[Groups("read")]
    private $birthDate;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticles(Articles $articles): self
    {
        if (!$this->articles->contains($articles)) {
            $this->articles[] = $articles;
            $articles->setUsers($this);
        }

        return $this;
    }

    public function removeArticles(Articles $articles): self
    {
        if ($this->articles->removeElement($articles)) {
            // set the owning side to null (unless already changed)
            if ($articles->getUsers() === $this) {
                $articles->setUsers(null);
            }
        }

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
}
