<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LikeRepository::class)
 * @ORM\Table(name="`like`")
 */
class Like
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="likes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_users;

    /**
     * @ORM\ManyToOne(targetEntity=comments::class, inversedBy="likes")
     */
    private $id_comments;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="likes")
     */
    private $id_post;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdComments(): ?comments
    {
        return $this->id_comments;
    }

    public function setIdComments(?comments $id_comments): self
    {
        $this->id_comments = $id_comments;

        return $this;
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
}
