<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ApiResource(
 *     routePrefix="/user",
 *     denormalizationContext={"groups"={"clients:write"}},
 *     normalizationContext={"groups"={"client:get"}},
 *     collectionOperations={
 *          "get"={
 *              "method"="GET",
 *              "path"="/clients",
 *     },
 *           "post"={
 *              "method"="POST",
 *              "path"="/clients",
 *     }
 *     },
 *    itemOperations={
 *          "get",
 *          "put"={
 *              "method"="PUT",
 *              "path"="/clients/{id}",
 *     }
 *     }
 * )
 *   @ApiFilter(SearchFilter::class, properties={"numCni"})
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"client:get", "clients:write"})
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"client:get", "clients:write"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"client:get", "clients:write"})
     */
    private $numCni;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="clientDepot")
     * @Groups({"trans_get"})
     */
    private $transactionDepot;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="clientRetrait")
     * @Groups({"trans_get", "client:get"})
     */
    private $transactionRetrait;

    public function __construct()
    {
        $this->transactionDepot = new ArrayCollection();
        $this->transactionRetrait = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNumCni(): ?string
    {
        return $this->numCni;
    }

    public function setNumCni(string $numCni): self
    {
        $this->numCni = $numCni;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactionDepot(): Collection
    {
        return $this->transactionDepot;
    }

    public function addTransactionDepot(Transaction $transactionDepot): self
    {
        if (!$this->transactionDepot->contains($transactionDepot)) {
            $this->transactionDepot[] = $transactionDepot;
            $transactionDepot->setClientDepot($this);
        }

        return $this;
    }

    public function removeTransactionDepot(Transaction $transactionDepot): self
    {
        if ($this->transactionDepot->removeElement($transactionDepot)) {
            // set the owning side to null (unless already changed)
            if ($transactionDepot->getClientDepot() === $this) {
                $transactionDepot->setClientDepot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactionRetrait(): Collection
    {
        return $this->transactionRetrait;
    }

    public function addTransactionRetrait(Transaction $transactionRetrait): self
    {
        if (!$this->transactionRetrait->contains($transactionRetrait)) {
            $this->transactionRetrait[] = $transactionRetrait;
            $transactionRetrait->setClientRetrait($this);
        }

        return $this;
    }

    public function removeTransactionRetrait(Transaction $transactionRetrait): self
    {
        if ($this->transactionRetrait->removeElement($transactionRetrait)) {
            // set the owning side to null (unless already changed)
            if ($transactionRetrait->getClientRetrait() === $this) {
                $transactionRetrait->setClientRetrait(null);
            }
        }

        return $this;
    }
}
