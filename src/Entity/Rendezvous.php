<?php

namespace App\Entity;

use App\Repository\RendezvousRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RendezvousRepository::class)
 */
class Rendezvous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

  /**
     * @Assert\NotBlank(message="Le Nom doit etre non vide")
     * @Assert\Length(
     *      min = 3,
     *      minMessage="Le Nom doit etre au minimum de 3 caractères"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

   /**
     * @Assert\NotBlank(message="Le Prénom doit etre non vide")
     * @Assert\Length(
     *      min = 3,
     *      minMessage="Le Prénom doit etre au minimum de 3 caractères"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

     /**
     * @Assert\NotBlank(message="L'email doit etre valide")
     * @Assert\Email(message="L'email doit etre valide")
     * 
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

     /**
     * @Assert\NotBlank(message="Le numéro doit etre non vide.")
     * @Assert\Positive(message="Le numéro doit etre valide.")
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

     /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Veuiller selectionner votre date")
     */
    private $Date;

     /**
     * @Assert\NotBlank(message="Veuillez sélectionner une spécialité.")
     * @ORM\Column(type="string", length=255)
     */
    private $spec;

    /**
     * @ORM\Column(type="string", length=800, nullable=true)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getSpec(): ?string
    {
        return $this->spec;
    }

    public function setSpec(string $spec): self
    {
        $this->spec = $spec;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

}
