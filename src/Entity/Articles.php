<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['article : read']],
    denormalizationContext: ['groups' => ['article : write']],
)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(["article : read", "user : read"])]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["article : read", "article : write", "user : read"])]
    private $name;

    #[ORM\Column(type: 'float')]
    #[Groups(["article : read", "article : write", "user : read"])]
    private $value;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["article : read", "article : write", "user : read"])]
    private $type;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'articles')]
    #[Groups([ "article : write"])]
    private Users $user;

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
