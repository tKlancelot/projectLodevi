<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"postGarage"}},
 *     normalizationContext={"groups"={"getGarage","getUser"}})
 * )
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getGarage","postGarage"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getGarage","postGarage"})
     */
    private $garageName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getGarage","postGarage"})
     */
    private $garageAdress;

    /**
     * @ORM\Column(type="string", length=8)
     * @Groups({"getGarage","postGarage"})
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=14)
     * @Groups({"getGarage","postGarage"})
     */
    private $siretNumber;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="garage")
     */
    private $advert;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="garages")
     * @Groups({"getGarage","getUser","postGarage"})
     */
    private $user;

    public function __construct()
    {
        $this->advert = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGarageName(): ?string
    {
        return $this->garageName;
    }

    public function setGarageName(string $garageName): self
    {
        $this->garageName = $garageName;

        return $this;
    }

    public function getGarageAdress(): ?string
    {
        return $this->garageAdress;
    }

    public function setGarageAdress(string $garageAdress): self
    {
        $this->garageAdress = $garageAdress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getSiretNumber(): ?string
    {
        return $this->siretNumber;
    }

    public function setSiretNumber(string $siretNumber): self
    {
        $this->siretNumber = $siretNumber;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdvert(): Collection
    {
        return $this->advert;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->advert->contains($advert)) {
            $this->advert[] = $advert;
            $advert->setGarage($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->advert->contains($advert)) {
            $this->advert->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getGarage() === $this) {
                $advert->setGarage(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
