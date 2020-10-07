<?php

namespace App\Entity;

use App\Repository\SneakersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SneakersRepository::class)
 */
class Sneakers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sku;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cwsurname;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture3;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addedAt;

    /**
     * @ORM\OneToMany(targetEntity=SneakersStock::class, mappedBy="Sneaker")
     */
    private $sneakersStocks;

    public function __construct()
    {
        $this->sneakersStocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCwsurname(): ?string
    {
        return $this->cwsurname;
    }

    public function setCwsurname(?string $cwsurname): self
    {
        $this->cwsurname = $cwsurname;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getPicture1(): ?string
    {
        return $this->picture1;
    }

    public function setPicture1(string $picture1): self
    {
        $this->picture1 = $picture1;

        return $this;
    }

    public function getPicture2(): ?string
    {
        return $this->picture2;
    }

    public function setPicture2(?string $picture2): self
    {
        $this->picture2 = $picture2;

        return $this;
    }

    public function getPicture3(): ?string
    {
        return $this->picture3;
    }

    public function setPicture3(?string $picture3): self
    {
        $this->picture3 = $picture3;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeInterface
    {
        return $this->addedAt;
    }

    public function setAddedAt(\DateTimeInterface $addedAt): self
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * @return Collection|SneakersStock[]
     */
    public function getSneakersStocks(): Collection
    {
        return $this->sneakersStocks;
    }

    public function addSneakersStock(SneakersStock $sneakersStock): self
    {
        if (!$this->sneakersStocks->contains($sneakersStock)) {
            $this->sneakersStocks[] = $sneakersStock;
            $sneakersStock->setSneaker($this);
        }

        return $this;
    }

    public function removeSneakersStock(SneakersStock $sneakersStock): self
    {
        if ($this->sneakersStocks->contains($sneakersStock)) {
            $this->sneakersStocks->removeElement($sneakersStock);
            // set the owning side to null (unless already changed)
            if ($sneakersStock->getSneaker() === $this) {
                $sneakersStock->setSneaker(null);
            }
        }

        return $this;
    }
}
