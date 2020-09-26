<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FuelTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"postFuelType"}},
 *     normalizationContext={"groups"={"getFuelType"}})
 * )
 * @ORM\Entity(repositoryClass=FuelTypeRepository::class)
 */
class FuelType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getFuelType"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getFuelType","postFuelType"})
     */
    private $fuelTypeLabel;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="fuelType")
     */
    private $adverts;

    public function __construct()
    {
        $this->adverts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelTypeLabel(): ?string
    {
        return $this->fuelTypeLabel;
    }

    public function setFuelTypeLabel(string $fuelTypeLabel): self
    {
        $this->fuelTypeLabel = $fuelTypeLabel;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdverts(): Collection
    {
        return $this->adverts;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->adverts->contains($advert)) {
            $this->adverts[] = $advert;
            $advert->setFuelType($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->contains($advert)) {
            $this->adverts->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getFuelType() === $this) {
                $advert->setFuelType(null);
            }
        }

        return $this;
    }
}
