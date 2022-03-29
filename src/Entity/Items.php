<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\ORM\Mapping as ORM;

    
#[ORM\Entity(repositoryClass: ItemsRepository::class)]
class Items
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    
    #[ORM\Column(type: 'float')]
    private $value;

    
    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'items')]
    private $itemOwner;

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

    public function getItemOwner(): ?Users
    {
        return $this->itemOwner;
    }

    public function setItemOwner(?Users $itemOwner): self
    {
        $this->itemOwner = $itemOwner;

        return $this;
    }

    
}
