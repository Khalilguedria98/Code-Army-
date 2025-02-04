<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id_evenement;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Type("string")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le nom de l'evènement ne peut pas contenir un numéro"
     * )

     */
    public $nom_evenement;

    /**
      * * @Assert\Date
      * @var string A "Y-m-d" formatted value
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date_evenement", type="datetime")
     */
    public $date_evenement;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le responsable ne peut pas etre un numéro"
     * )
     */
    public $responsable;

    /**
     * @ORM\Column(type="string", length=30)
     * * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="la description  ne peut pas contenir des numéros"
     * )
     */
    public $description;

    /**
     * @ORM\Column(type="string", length=30, options={"default": "non approuvée"})
     */
    public $etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(
     * type="integer",
     * message="The value  is notvalid."
     * )
     * @var  integer

     */
    public $nbr_place;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="Events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;









    public function getId_evenement(): ?int
    {
        return $this->$id_evenement;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nom_evenement;
    }

    public function setNomEvenement(string $nom_evenement): self
    {
        $this->nom_evenement = $nom_evenement;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->date_evenement;
    }

    public function setDateEvenement(\DateTimeInterface $date_evenement): self
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = "non approuvée";

    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getNbrPlace(): ?int
    {
        return $this->nbr_place;
    }

    public function setNbrPlace(int $nbr_place): self
    {
        $this->nbr_place = $nbr_place;

        return $this;
    }

    public function decrementnbr(){

        $this->nbr_place-1 ;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }













}
