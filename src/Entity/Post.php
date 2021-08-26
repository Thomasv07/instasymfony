<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_post;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocations(): ?string
    {
        return $this->locations;
    }

    public function setLocations(?string $locations): self
    {
        $this->locations = $locations;

        return $this;
    }

    public function getUrlPost(): ?string
    {
        return $this->url_post;
    }

    public function setUrlPost(string $url_post): self
    {
        $this->url_post = $url_post;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
