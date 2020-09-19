<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"getBrand"}})
 * )
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getBrand"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getBrand"})
     */
    private $brandLabel;

    /**
     * @ORM\OneToMany(targetEntity=CarModel::class, mappedBy="brand")
     */
    private $carModels;

    public function __construct()
    {
        $this->carModels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandLabel(): ?string
    {
        return $this->brandLabel;
    }

    public function setBrandLabel(string $brandLabel): self
    {
        $this->brandLabel = $brandLabel;

        return $this;
    }

    /**
     * @return Collection|CarModel[]
     */
    public function getCarModels(): Collection
    {
        return $this->carModels;
    }

    public function addCarModel(CarModel $carModel): self
    {
        if (!$this->carModels->contains($carModel)) {
            $this->carModels[] = $carModel;
            $carModel->setBrand($this);
        }

        return $this;
    }

    public function removeCarModel(CarModel $carModel): self
    {
        if ($this->carModels->contains($carModel)) {
            $this->carModels->removeElement($carModel);
            // set the owning side to null (unless already changed)
            if ($carModel->getBrand() === $this) {
                $carModel->setBrand(null);
            }
        }

        return $this;
    }
}
