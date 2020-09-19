<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
/*        $tab = array(
            array('username' => 'peter', 'password' => 'password', 'roles' => array(0 => 'ROLE_USER')),
            array('username' => 'sam', 'password' => 'password', 'roles' => array(0 => 'ROLE_USER')),
            array('username' => 'tom', 'password' => 'password', 'roles' => array(0 => 'ROLE_USER')),
            array('username' => 'tarik', 'password' => 'password', 'roles' => ['ROLE_ADMIN'])
        );

        foreach ($tab as $row) {

            $user = new User();
            $user->setUsername($row['username']);
            $encoded = $this->encoder->encodePassword($user, $row['password']);
            $user->setPassword($encoded);
            $user->setRoles($row['roles']);
            $manager->persist($user);
        }*/

        $user1 = new User();
        $user1->setUsername('tarik');
        $user1->setRoles(['ROLE_ADMIN']);
        $encoded = $this->encoder->encodePassword($user1,'password');
        $user1->setPassword($encoded);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('peter');
        $user2->setRoles(['ROLE_USER']);
        $encoded = $this->encoder->encodePassword($user2,'password');
        $user2->setPassword($encoded);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('sam');
        $user3->setRoles(['ROLE_USER']);
        $encoded = $this->encoder->encodePassword($user3,'password');
        $user3->setPassword($encoded);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUsername('john');
        $user4->setRoles(['ROLE_USER']);
        $encoded = $this->encoder->encodePassword($user4,'password');
        $user4->setPassword($encoded);
        $manager->persist($user4);

        $marque1 = new Brand();
        $marque1->setBrandLabel('Toyota');
        $manager->persist($marque1);

        $marque2 = new Brand();
        $marque2->setBrandLabel('Mitsubishi');
        $manager->persist($marque2);

        $marque3 = new Brand();
        $marque3->setBrandLabel('Honda');
        $manager->persist($marque3);

        $marque4 = new Brand();
        $marque4->setBrandLabel('Peugeot');
        $manager->persist($marque4);

        $marque5 = new Brand();
        $marque5->setBrandLabel('Renault');
        $manager->persist($marque5);

        $marque6 = new Brand();
        $marque6->setBrandLabel('Citroën');
        $manager->persist($marque6);

        $marque7 = new Brand();
        $marque7->setBrandLabel('Mercedes');
        $manager->persist($marque7);

        $marque8 = new Brand();
        $marque8->setBrandLabel('Kia');
        $manager->persist($marque8);

        $marque9 = new Brand();
        $marque9->setBrandLabel('Wolkswagen');
        $manager->persist($marque9);


        $manager->flush();

        $this->addReference('marque1', $marque1);
        $this->addReference('marque2', $marque2);
        $this->addReference('marque3', $marque3);
        $this->addReference('marque4', $marque4);
        $this->addReference('marque5', $marque5);
        $this->addReference('marque6', $marque6);
        $this->addReference('marque7', $marque7);
        $this->addReference('marque8', $marque8);
        $this->addReference('marque9', $marque9);

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);

    }

    public function getOrder(){
        return 1;
    }
}




