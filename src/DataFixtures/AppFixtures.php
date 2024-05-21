<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $timezone = new DateTimeZone('Europe/Paris');
        $faker = Factory::create('fr_FR');
        
        // user
        $userList = [
            [
                'role' => 'ROLE_ADMIN',
                'firstname' => 'Talya',
                'lastname'  => 'LALAOUI',
                'email' => 'talya@ofestival.fr'
            ],
            [
                'role' => 'ROLE_ADMIN',
                'firstname' => 'Badri',
                'lastname'  => 'CHOULAK',
                'email' => 'badri@ofestival.fr'
            ],
            [
                'role' => 'ROLE_ADMIN',
                'firstname' => 'Nicolas',
                'lastname'  => 'JOUBERT',
                'email' => 'nicolas@ofestival.fr'
            ],
            [
                'role' => 'ROLE_ADMIN',
                'firstname' => 'Marjorie',
                'lastname'  => 'MARCOS',
                'email' => 'marjorie@ofestival.fr'
            ],
            
        ];
 
        for ($i = 0; $i <= 3; $i++) {
            $user = new User();
            $user->setEmail($userList[$i]['email']);
            $user->setRole($userList[$i]['role']);
            $user->setFirstname($userList[$i]['firstname']);
            $user->setLastname($userList[$i]['lastname']);
            $user->setPassword('$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO');
            $user->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
