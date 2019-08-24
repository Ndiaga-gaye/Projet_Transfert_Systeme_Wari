<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\DepotRepository")
 */
class Depot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumeroCompte;

    /**
     * @ORM\Column(type="integer")
     */
    private $MontantDepot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DateDepot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CompteBancaire", inversedBy="depots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ProprietaireCompte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="depots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Caissier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?int
    {
        return $this->NumeroCompte;
    }

    public function setNumeroCompte(int $NumeroCompte): self
    {
        $this->NumeroCompte = $NumeroCompte;

        return $this;
    }

    public function getMontantDepot(): ?int
    {
        return $this->MontantDepot;
    }

    public function setMontantDepot(int $MontantDepot): self
    {
        $this->MontantDepot = $MontantDepot;

        return $this;
    }

    public function getDateDepot(): ?string
    {
        return $this->DateDepot;
    }

    public function setDateDepot(string $DateDepot): self
    {
        $this->DateDepot = $DateDepot;

        return $this;
    }

    public function getProprietaireCompte(): ?CompteBancaire
    {
        return $this->ProprietaireCompte;
    }

    public function setProprietaireCompte(?CompteBancaire $ProprietaireCompte): self
    {
        $this->ProprietaireCompte = $ProprietaireCompte;

        return $this;
    }

    public function getCaissier(): ?User
    {
        return $this->Caissier;
    }

    public function setCaissier(?User $Caissier): self
    {
        $this->Caissier = $Caissier;

        return $this;
    }
}
