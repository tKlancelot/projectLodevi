<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"postAdvert"}},
 *     normalizationContext={"groups"={"getAdvert","getModel","getBrand","getGarage","getUser","getFuelType"}})
 * )
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     * @Groups({"getAdvert","postAdvert"})
     */
    private $reference;

    /**
     * @ORM\Column(type="float")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $mileage;


    /**
     * @ORM\Column(type="date")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $releaseYear;

    /**
     * @ORM\Column(type="date")
     * @Groups({"getAdvert","postAdvert"})
     */
    private $publicationDate;

    /**
     * @ORM\ManyToOne(targetEntity=CarModel::class, inversedBy="adverts")
     *
     * @Groups({"getAdvert", "getModel","getBrand","postAdvert"})
     */
    private $carModel;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="advert", cascade={"persist"})
     * @ApiProperty(attributes={"fetchEager": false})
     * @Groups({"getAdvert", "getGarage","getUser","postAdvert"})
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"getAdvert","postAdvert"})
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=FuelType::class, inversedBy="adverts")
     * @Groups({"getAdvert","postAdvert","getFuelType"})
     */
    private $fuelType;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

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

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }


    public function getReleaseYear(): ?\DateTimeInterface
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(\DateTimeInterface $releaseYear): self
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getCarModel(): ?CarModel
    {
        return $this->carModel;
    }

    public function setCarModel(?CarModel $carModel): self
    {
        $this->carModel = $carModel;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getFuelType(): ?FuelType
    {
        return $this->fuelType;
    }

    public function setFuelType(?FuelType $fuelType): self
    {
        $this->fuelType = $fuelType;

        return $this;
    }
}
