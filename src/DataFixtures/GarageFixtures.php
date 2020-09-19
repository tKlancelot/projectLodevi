<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Garage;

class GarageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tab1 = array(
            array('garageAdress' => '12 rue du Bois Vert', 'garageName' => 'Garage Eiffel', 'postalCode' => '75016', 'siretNumber' => '12844512322788', 'user' => $this->getReference('user2')),
            array('garageAdress' => '36 rue des Oliviers', 'garageName' => 'Garage de l\'Obélisque', 'postalCode' => '75008', 'siretNumber' => '22483136695923', 'user' => $this->getReference('user2')),
            array('garageAdress' => '04 avenue des Tilleuls', 'garageName' => 'Garage de la Basilique', 'postalCode' => '75018', 'siretNumber' => '24781159661534', 'user' => $this->getReference('user3')),
            array('garageAdress' => '112 boulevard de la Forêt', 'garageName' => 'Garage du centre Georges Pompidou', 'postalCode' => '75004', 'siretNumber' => '22684743615162', 'user' => $this->getReference('user4'))
        );

        foreach ($tab1 as $row) {

            $garage = new Garage();
            $garage->setGarageAdress($row['garageAdress']);
            $garage->setGarageName($row['garageName']);
            $garage->setPostalCode($row['postalCode']);
            $garage->setSiretNumber($row['siretNumber']);
            $garage->setUser($row['user']);
            $manager->persist($garage);
        }

        $garage1 = new Garage();
        $garage1->setSiretNumber('44851212516892');
        $garage1->setPostalCode('69000');
        $garage1->setGarageName('Garage Golden');
        $garage1->setGarageAdress('24 rue des lingots d\'or');
        $garage1->setUser($this->getReference('user3'));

        $manager->flush();

        $this->addReference('garage1', $garage1);
    }
    public function getOrder(){
        return 3;
    }
}
