<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CarModel;

class CarModelFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    $tab1 = array(
    array('modelName' => 'avensis', 'brand' => $this->getReference('marque1')),
    array('modelName' => 'eclipse cross', 'brand' => $this->getReference('marque2')),
    array('modelName' => 'civic', 'brand' => $this->getReference('marque3')),
    array('modelName' => '3008', 'brand' => $this->getReference('marque4')),
    array('modelName' => '308', 'brand' => $this->getReference('marque4')),
    array('modelName' => 'clio', 'brand' => $this->getReference('marque5'))
    );

    foreach ($tab1 as $row) {

    $carModel = new CarModel();
    $carModel->setModelName($row['modelName']);
    $carModel->setBrand($row['brand']);
    $manager->persist($carModel);
    }

    $carModel1 = new CarModel();
    $carModel1->setModelName('megane');
    $carModel1->setBrand($this->getReference('marque5'));
    $manager->persist($carModel1);

        $manager->flush();

        $this->addReference('carModel1', $carModel1);
    }



    public function getOrder(){
        return 2;
    }


}


/*        $carModel1 = new CarModel();
        $carModel1->setModelName('avensis');
        $carModel1->setBrand($this->getReference('marque1'));
        $manager->persist($carModel1);

        $carModel2 = new CarModel();
        $carModel2->setModelName('eclipse cross');
        $carModel2->setBrand($this->getReference('marque2'));
        $manager->persist($carModel2);

        $carModel3 = new CarModel();
        $carModel3->setModelName('civic');
        $carModel3->setBrand($this->getReference('marque3'));
        $manager->persist($carModel3);*/
