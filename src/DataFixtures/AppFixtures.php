<?php

namespace App\DataFixtures;

use App\DataFixtures\Providers\AppProvider;
use App\Entity\Artist;
use App\Entity\Genre;
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
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new AppProvider($faker));
        $faker = Factory::create();
        $faker->addProvider(new \Faker\Provider\Youtube($faker));
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $timezone = new DateTimeZone('Europe/Paris');

        // Genre
        $genreList = [];
        for ($i = 0; $i < 20; $i++) {
            $genre = (new Genre())
                ->setName($faker->unique()->genreName());
            $manager->persist($genre);
            $genreList[] = $genre;
        };

        // Artiste
        $artistList = [];
        for ($i = 0; $i < 50; $i++) {
            $artist = (new Artist())
                ->setName($faker->unique()->singerName())
                ->setDescription($faker->paragraphs())
                ->setPicture($faker->imageUrl())
                ->setVideo($faker->youtubeUri())
                ->setPicture($faker->imageUrl());
            for ($j = 1; $j <= mt_rand(1, 2); $j++) {
                $artist->addGenre($genreList[array_rand($genreList)]);
            }
            $manager->persist($artist);
            $artistList[] = $artist;
        };

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
