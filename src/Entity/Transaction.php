<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
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
    private $NomEnvoyeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomEnvoyeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumeroIdentite;

    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $TelephoneBeneficiaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomBeneficiare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomBeneficiare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DateEmvoie;

    /**
     * @ORM\Column(type="integer")
     */
    private $CodeEnvoie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEnvoyeur(): ?string
    {
        return $this->NomEnvoyeur;
    }

    public function setNomEnvoyeur(string $NomEnvoyeur): self
    {
        $this->NomEnvoyeur = $NomEnvoyeur;

        return $this;
    }

    public function getPrenomEnvoyeur(): ?string
    {
        return $this->PrenomEnvoyeur;
    }

    public function setPrenomEnvoyeur(string $PrenomEnvoyeur): self
    {
        $this->PrenomEnvoyeur = $PrenomEnvoyeur;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(string $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getNumeroIdentite(): ?int
    {
        return $this->NumeroIdentite;
    }

    public function setNumeroIdentite(int $NumeroIdentite): self
    {
        $this->NumeroIdentite = $NumeroIdentite;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getTelephoneBeneficiaire(): ?int
    {
        return $this->TelephoneBeneficiaire;
    }

    public function setTelephoneBeneficiaire(int $TelephoneBeneficiaire): self
    {
        $this->TelephoneBeneficiaire = $TelephoneBeneficiaire;

        return $this;
    }

    public function getNomBeneficiare(): ?string
    {
        return $this->NomBeneficiare;
    }

    public function setNomBeneficiare(string $NomBeneficiare): self
    {
        $this->NomBeneficiare = $NomBeneficiare;

        return $this;
    }

    public function getPrenomBeneficiare(): ?string
    {
        return $this->PrenomBeneficiare;
    }

    public function setPrenomBeneficiare(string $PrenomBeneficiare): self
    {
        $this->PrenomBeneficiare = $PrenomBeneficiare;

        return $this;
    }

    public function getDateEmvoie(): ?string
    {
        return $this->DateEmvoie;
    }

    public function setDateEmvoie(string $DateEmvoie): self
    {
        $this->DateEmvoie = $DateEmvoie;

        return $this;
    }

    public function getCodeEnvoie(): ?int
    {
        return $this->CodeEnvoie;
    }

    public function setCodeEnvoie(int $CodeEnvoie): self
    {
        $this->CodeEnvoie = $CodeEnvoie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
