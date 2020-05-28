<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var Category[]
     * @ORM\OneToMany(targetEntity="Category", mappedBy="category")
     */
    private $categories;

    /**
     * @var Flow[]
     * @ORM\OneToMany(targetEntity="Flow", mappedBy="flow")
     */
    private $flows;

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return Flow[]
     */
    public function getFlows(): array
    {
        return $this->flows;
    }

    /**
     * @param Flow[] $flows
     */
    public function setFlows(array $flows): void
    {
        $this->flows = $flows;
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
}
