<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 * @ApiResource(
 *      routePrefix="/user",
 *      attributes={"denormalization_context"={"groups"={"trans_write"},
 *                "normalizationContext"= {"groups"={"retrait_red"}} 
 *          }
 *     },
 *     collectionOperations={
 *          "retrait"={
 *              "method"="GET",
 *              "path"="/transaction",
 *     },
 *            "depot"={
 *              "method"="POST",
 *              "path"="/transaction",
 *     },
 *         "transCompte"={
 *              "method"="GET",
 *              "path"="/admin/compte/{id}/transactions",
 *     },
 *          "montant"={
 *              "method"="GET",
 *              "path"="/transaction/frais/{montant}",
 *     }
 * }
 * )
 *  @ApiFilter(SearchFilter::class, properties={"id": "exact", "codeTrans":"exact", "dateRetrait":"partial", "dateDepot":"partial", "montant":"exact", "statut":"exact", "userRetrait.id":"exact", "userDepot.id":"exact", "clientDepot.telephone":"exact", "clientRetrait.telephone":"exact"})
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"trans_get", "trans_write"})
     * @Groups({ "codeTran_red"})
     * @Groups({"retrait_red"})
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     * @Groups({"trans_get", "trans_write"})
     * @Groups({ "codeTran_red"})
     * @Groups({"retrait_red"})
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="date")
     * @Groups({ "codeTran_red"})
     * @Groups({"retrait_red"})
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"trans_get", "trans_write"})
     */
    private $codeTrans;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"trans_get", "trans_write"})
     */
    private $frais;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"trans_get","trans_write"})
     */
    private $fraisDepot;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisRetrait;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"trans_get", "trans_write"})
     */
    private $fraisEtat;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"trans_write"})
     */
    private $fraisSysteme;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactionDepot", cascade={"persist"})
     * @Groups({"trans_write"})
     */
    private $userDepot;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactionRetrait", cascade={"persist"})
     * @Groups({"retrait_red"})
     */
    private $userRetrait;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactionDepot", cascade={"persist"})
     * @Groups({"retrait_red"})
     *  @Groups({"codeTran_red"})
     */
    private $clientDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactionRetrait", cascade={"persist"})
     * @Groups({"codeTran_red"})
     * @Groups({"retrait_red"})
     */
    private $clientRetrait;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactionDepot", cascade={"persist"})
     * @Groups({"codeTran_red"})
     */
    private $compteDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactionRetrait", cascade={"persist"})
     * @Groups({"retrait_red"})
     */
    private $compteRetrait;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getCodeTrans(): ?string
    {
        return $this->codeTrans;
    }

    public function setCodeTrans(string $codeTrans): self
    {
        $this->codeTrans = $codeTrans;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getFraisDepot(): ?int
    {
        return $this->fraisDepot;
    }

    public function setFraisDepot(int $fraisDepot): self
    {
        $this->fraisDepot = $fraisDepot;

        return $this;
    }

    public function getFraisRetrait(): ?int
    {
        return $this->fraisRetrait;
    }

    public function setFraisRetrait(int $fraisRetrait): self
    {
        $this->fraisRetrait = $fraisRetrait;

        return $this;
    }

    public function getFraisEtat(): ?int
    {
        return $this->fraisEtat;
    }

    public function setFraisEtat(int $fraisEtat): self
    {
        $this->fraisEtat = $fraisEtat;

        return $this;
    }

    public function getFraisSysteme(): ?int
    {
        return $this->fraisSysteme;
    }

    public function setFraisSysteme(int $fraisSysteme): self
    {
        $this->fraisSysteme = $fraisSysteme;

        return $this;
    }

    public function getUserDepot(): ?User
    {
        return $this->userDepot;
    }

    public function setUserDepot(?User $userDepot): self
    {
        $this->userDepot = $userDepot;

        return $this;
    }

    public function getUserRetrait(): ?User
    {
        return $this->userRetrait;
    }

    public function setUserRetrait(?User $userRetrait): self
    {
        $this->userRetrait = $userRetrait;

        return $this;
    }

    public function getClientDepot(): ?Client
    {
        return $this->clientDepot;
    }

    public function setClientDepot(?Client $clientDepot): self
    {
        $this->clientDepot = $clientDepot;

        return $this;
    }

    public function getClientRetrait(): ?Client
    {
        return $this->clientRetrait;
    }

    public function setClientRetrait(?Client $clientRetrait): self
    {
        $this->clientRetrait = $clientRetrait;

        return $this;
    }

    public function getCompteDepot(): ?Compte
    {
        return $this->compteDepot;
    }

    public function setCompteDepot(?Compte $compteDepot): self
    {
        $this->compteDepot = $compteDepot;

        return $this;
    }

    public function getCompteRetrait(): ?Compte
    {
        return $this->compteRetrait;
    }

    public function setCompteRetrait(?Compte $compteRetrait): self
    {
        $this->compteRetrait = $compteRetrait;

        return $this;
    }

}
