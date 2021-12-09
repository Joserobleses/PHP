<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $descriptionplace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $pais;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $poblacio;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $tipus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valoracio;

    

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="place", cascade={"persist"})
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="place")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="place", cascade={"persist"})
     */
    private $photoss;


    public function __construct()
    {
        
        $this->comments = new ArrayCollection();
        $this->photoss = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescriptionplace(): ?string
    {
        return $this->descriptionplace;
    }

    public function setDescriptionplace(?string $descriptionplace): self
    {
        $this->descriptionplace = $descriptionplace;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getPoblacio(): ?string
    {
        return $this->poblacio;
    }

    public function setPoblacio(?string $poblacio): self
    {
        $this->poblacio = $poblacio;

        return $this;
    }

    public function getTipus(): ?string
    {
        return $this->tipus;
    }

    public function setTipus(?string $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function getValoracio(): ?int
    {
        return $this->valoracio;
    }

    public function setValoracio(?int $valoracio): self
    {
        $this->valoracio = $valoracio;

        return $this;
    }



    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPlace($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPlace() === $this) {
                $comment->setPlace(null);
            }
        }

        return $this;
    }
    
    
    public function getUser(): ?User
    {
    return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotoss(): Collection
    {
        return $this->photoss;
    }

    public function addPhotoss(Photo $photoss): self
    {
        if (!$this->photoss->contains($photoss)) {
            $this->photoss[] = $photoss;
            $photoss->setPlace($this);
        }

        return $this;
    }

    public function removePhotoss(Photo $photoss): self
    {
        if ($this->photoss->removeElement($photoss)) {
            // set the owning side to null (unless already changed)
            if ($photoss->getPlace() === $this) {
                $photoss->setPlace(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return "ID: $this->id - $this->nom Descripcion $this->descriptionplace Foto $this->foto Pais $this->pais Poblacion $this->poblacio valoracion $this->valoracio";
    }

}
