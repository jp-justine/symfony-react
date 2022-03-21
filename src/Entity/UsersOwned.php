<?php

namespace App\Entity;

use App\Repository\UsersOwnedRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

    /**
     *  items owned by a user
     *
     */
#[ORM\Entity(repositoryClass: UsersOwnedRepository::class)]
#[ApiResource]
class UsersOwned
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
     *  item name.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    /**
     *  item value.
     *
     */
    #[ORM\Column(type: 'float')]
    private $value;

    /**
     *  item type.
     *
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    /**
     *  which user's property is this item.
     *
     */
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'usersOwneds')]
    private $user;

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

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }
}
