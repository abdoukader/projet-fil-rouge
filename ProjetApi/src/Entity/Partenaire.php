<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registreCommerce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\compte", cascade={"persist", "remove"})
     */
    private $compte;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\user", mappedBy="partenaire")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
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

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRegistreCommerce(): ?string
    {
        return $this->registreCommerce;
    }

    public function setRegistreCommerce(string $registreCommerce): self
    {
        $this->registreCommerce = $registreCommerce;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCompte(): ?compte
    {
        return $this->compte;
    }

    public function setCompte(?compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setPartenaire($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPartenaire() === $this) {
                $user->setPartenaire(null);
            }
        }

        return $this;
    }
}
