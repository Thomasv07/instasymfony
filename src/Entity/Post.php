<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="id_post")
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="id_post")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="posts")
     */
    private $id_users;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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

    /**
     * @return Collection|Like[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setIdPost($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getIdPost() === $this) {
                $like->setIdPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setIdPost($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getIdPost() === $this) {
                $comment->setIdPost(null);
            }
        }

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
