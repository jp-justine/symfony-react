<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['user : read']],
    denormalizationContext: ['groups' => ['user : write']],
)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["user : read", "user : write"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user : read", "user : write"])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user : read", "user : write"])]
    private $mail;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user : read", "user : write"])]
    private $address;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user : read", "user : write"])]
    private $phone;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Articles::class, orphanRemoval: true)]
    #[Groups(["user : read", "user : write"])]
    #[ApiSubresource]
    private $articles;

    #[ORM\Column(type: 'date')]
    private $birthdate;

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
     * @return Collection|Articles[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setUser($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUser() === $this) {
                $article->setUser(null);
            }
        }

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }
    
}
