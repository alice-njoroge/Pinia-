<?php

namespace App\Entity;

use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
class Todo implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(options: ['default'=> false])]
    private ?bool $completed = null;

    #[ORM\Column(options: ['default'=> false])]
    private ?bool $favourite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): static
    {
        $this->completed = $completed;

        return $this;
    }

    public function isFavourite(): ?bool
    {
        return $this->favourite;
    }

    public function setFavourite(bool $favourite): static
    {
        $this->favourite = $favourite;

        return $this;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'isCompleted' => $this->isCompleted(),
            'isFavourite' => $this->isFavourite()
        ];
    }
}
