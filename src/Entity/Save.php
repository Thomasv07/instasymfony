<?php

namespace App\Entity;

use App\Repository\SaveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaveRepository::class)
 */
class Save
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="saves")
     */
    private $id_post;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="saves")
     */
    private $id_users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPost(): ?post
    {
        return $this->id_post;
    }

    public function setIdPost(?post $id_post): self
    {
        $this->id_post = $id_post;

        return $this;
    }

    public function getIdUsers(): ?users
    {
        return $this->id_users;
    }

    public function setIdUsers(?users $id_users): self
    {
        $this->id_users = $id_users;

        return $this;
    }
}
