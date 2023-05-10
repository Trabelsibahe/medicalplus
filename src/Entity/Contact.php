<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
     *      minMessage="Le Prénom doit etre au minimum de 5 caractères"
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
     * @Assert\NotBlank(message="Le Sujet doit etre non vide")
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $Sujet;
   /**
     * @Assert\NotBlank(message="Le Message doit etre non vide")
     * @Assert\Length(
     *      min =10,
     *      minMessage="Le Message doit etre au minimum de 10 caractères"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $Message;

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

    public function getSujet(): ?string
    {
        return $this->Sujet;
    }

    public function setSujet(string $Sujet): self
    {
        $this->Sujet = $Sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }
}
