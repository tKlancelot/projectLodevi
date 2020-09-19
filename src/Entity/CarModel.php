<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CarModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CarModelRepository::class)
 * @ApiResource(
 *     denormalizationContext={"groups"={"postModel"}},
 *     normalizationContext={"groups"={"getModel","getBrand"}})
 * )
 */
class CarModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getModel"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getModel","postModel"})
     */
    private $modelName;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="carModels", fetch="EAGER")
     * @Groups({"getBrand","postModel"})
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="carModel")
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

    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    public function setModelName(string $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

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
            $advert->setCarModel($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->contains($advert)) {
            $this->adverts->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getCarModel() === $this) {
                $advert->setCarModel(null);
            }
        }

        return $this;
    }
}
