<?php

namespace App\Entity;

use App\Repository\ConstatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstatRepository::class)]
class Constat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_incident = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $heure_incident = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cordonnees_des_conducteurs = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $images_de_deux_vehicules_accidentees = null;

    #[ORM\Column(length: 255)]
    private ?string $temoins = null;

    #[ORM\ManyToOne(inversedBy: 'constats')]
    private ?Expert $expert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIncident(): ?\DateTimeInterface
    {
        return $this->date_incident;
    }

    public function setDateIncident(\DateTimeInterface $date_incident): static
    {
        $this->date_incident = $date_incident;

        return $this;
    }

    public function getHeureIncident(): ?\DateTimeInterface
    {
        return $this->heure_incident;
    }

    public function setHeureIncident(\DateTimeInterface $heure_incident): static
    {
        $this->heure_incident = $heure_incident;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCordonneesDesConducteurs(): ?string
    {
        return $this->cordonnees_des_conducteurs;
    }

    public function setCordonneesDesConducteurs(string $cordonnees_des_conducteurs): static
    {
        $this->cordonnees_des_conducteurs = $cordonnees_des_conducteurs;

        return $this;
    }

    public function getImagesDeDeuxVehiculesAccidentees(): ?string
    {
        return $this->images_de_deux_vehicules_accidentees;
    }

    public function setImagesDeDeuxVehiculesAccidentees(string $images_de_deux_vehicules_accidentees): static
    {
        $this->images_de_deux_vehicules_accidentees = $images_de_deux_vehicules_accidentees;

        return $this;
    }

    public function getTemoins(): ?string
    {
        return $this->temoins;
    }

    public function setTemoins(string $temoins): static
    {
        $this->temoins = $temoins;

        return $this;
    }

    public function getExpert(): ?Expert
    {
        return $this->expert;
    }

    public function setExpert(?Expert $expert): static
    {
        $this->expert = $expert;

        return $this;
    }

    
}
