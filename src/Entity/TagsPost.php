<?php

namespace App\Entity;

use App\Repository\TagsPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagsPostRepository::class)
 */
class TagsPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=tags::class, mappedBy="tagsPost", orphanRemoval=true)
     */
    private $id_tags;

    /**
     * @ORM\OneToMany(targetEntity=post::class, mappedBy="tagsPost")
     */
    private $id_post;

    public function __construct()
    {
        $this->id_tags = new ArrayCollection();
        $this->id_post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|tags[]
     */
    public function getIdTags(): Collection
    {
        return $this->id_tags;
    }

    public function addIdTag(tags $idTag): self
    {
        if (!$this->id_tags->contains($idTag)) {
            $this->id_tags[] = $idTag;
            $idTag->setTagsPost($this);
        }

        return $this;
    }

    public function removeIdTag(tags $idTag): self
    {
        if ($this->id_tags->removeElement($idTag)) {
            // set the owning side to null (unless already changed)
            if ($idTag->getTagsPost() === $this) {
                $idTag->setTagsPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|post[]
     */
    public function getIdPost(): Collection
    {
        return $this->id_post;
    }

    public function addIdPost(post $idPost): self
    {
        if (!$this->id_post->contains($idPost)) {
            $this->id_post[] = $idPost;
            $idPost->setTagsPost($this);
        }

        return $this;
    }

    public function removeIdPost(post $idPost): self
    {
        if ($this->id_post->removeElement($idPost)) {
            // set the owning side to null (unless already changed)
            if ($idPost->getTagsPost() === $this) {
                $idPost->setTagsPost(null);
            }
        }

        return $this;
    }
}
