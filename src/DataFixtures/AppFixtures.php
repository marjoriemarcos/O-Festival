<?php

namespace App\DataFixtures;

use App\DataFixtures\Providers\AppProvider;
use App\Entity\Artist;
use App\Entity\Customer;
use App\Entity\Genre;
use App\Entity\Slot;
use App\Entity\Stage;
use App\Entity\Ticket;
use App\Entity\User;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new AppProvider($faker));
        $faker->addProvider(new \Faker\Provider\Youtube($faker));
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $timezone = new DateTimeZone('Europe/Paris');

        // Genre
        $genreList = [];
        for ($i = 0; $i < 15; $i++) {
            $genre = (new Genre())
                ->setName($faker->unique()->genreName())
                ->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($genre);
            $genreList[] = $genre;
        };

        // Stage
        $stageList = [];
        for ($i = 1; $i < 5; $i++) {
            $stage = (new Stage())
                ->setName('scene' . $i)
                ->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($stage);
            $stageList[] = $stage;
        };

        // Artiste
        $artistList = [];
        for ($i = 0; $i < 20; $i++) {
            $artist = (new Artist())
                ->setName($faker->unique()->singerName())
                ->setDescription($faker->text())
                ->setPicture($faker->imageUrl())
                ->setVideo('https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX')
                ->setPicture($faker->imageUrl())
                ->setCreatedAt(new DateTimeImmutable('now', $timezone));
            for ($j = 1; $j <= mt_rand(1, 2); $j++) {
                $artist->addGenre($genreList[array_rand($genreList)]);
            }
            $manager->persist($artist);
            $artistList[] = $artist;
        };

        // Slot
        $hour = [
            '16 heures à 18 heures',
            '18 heures à 20 heures',
            '20 heures à 22 heures',
            '22 heures à minuit',
        ];

        $dateDay = [
            '2024-08-23' => 'J1',
            '2024-08-24' => 'J2',
            '2024-08-25' => 'J3',
        ];

        $date = new DateTimeImmutable('2024-08-23');

        for ($l = 0; $l < 3; $l++) {
            $day = $dateDay[$date->format('Y-m-d')];
            foreach ($hour as $hourValue) {
                $slot = new Slot();
                $slot->setDate($date);
                $slot->setHour($hourValue);
                $slot->setDay($day);
                //array_shift nous permet de prendre le premier element du tableau et de le supprimer une fois utilisée
                $slot->setArtist(array_shift($artistList));
                $slot->setStage($stageList[array_rand($stageList)]);
                $slot->setCreatedAt(new DateTimeImmutable('now', $timezone));
                $manager->persist($slot);
            }
            $date = $date->modify('+1 day');
        };

        // Customer
        $customerList = [];
        for ($i = 0; $i < 50; $i++) {
            $customer = (new Customer())
                ->setFirstname($faker->firstname())
                ->setLastname($faker->lastname())
                ->setBirthdate($faker->dateTime())
                ->setEmail($faker->email())
                ->setPhoneNumber($faker->mobileNumber())
                ->setPostcode($faker->postcode())
                ->setAdress($faker->address())
                ->setTown($faker->city())
                ->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($customer);
            $customerList[] = $customer;
        }


        // Ticket 

        // Liste des fees et leurs prix
        $feeList = [
            'Plein Tarif' => 200,
            'Tarif Etudiant' => 100,
            'Tarif Enfant' => 0,
        ];

        // Dates du festival
        $festivalStartDate = new DateTimeImmutable('2024-05-23');
        $festivalEndDate = new DateTimeImmutable('2024-05-25');

        // Génération des tickets pour chaque jour (vendredi, samedi, dimanche)
        for ($i = 0; $i < 3; $i++) {
            foreach ($feeList as $fee => $price) {
                $ticket = new Ticket();
                $ticket->setTitle("Pass 1 JOUR $fee - " . $festivalStartDate->format('d/m/Y'));
                $ticket->setStartAt($festivalStartDate);
                $ticket->setEndAt($festivalStartDate);
                $ticket->setDuration(24);
                $ticket->setFee($fee);
                $ticket->setPrice($price);
                $ticket->setQuantity(mt_rand(0, 30)); // Quantité aléatoire entre 0 et 30
                $ticket->setCreatedAt(new DateTimeImmutable('now', $timezone));
                // Persister le ticket
                $manager->persist($ticket);
            }
            $festivalStartDate = $festivalStartDate->modify('+1 day');
        }

        // Génération des tickets pour les 2 derniers jours (samedi et dimanche)
        foreach ($feeList as $fee => $price) {
            $ticket = new Ticket();
            $ticket->setTitle("Pass 2 JOURS $fee du " . $festivalStartDate->format('d/m/Y') . ' au ' . $festivalEndDate->format('d/m/Y'));
            $ticket->setStartAt($festivalEndDate->modify('-1 day'));
            $ticket->setEndAt($festivalEndDate);
            $ticket->setDuration(48);
            $ticket->setFee($fee);
            $ticket->setPrice($price * 1.75); // Prix plus cher pour 2 jours
            $ticket->setQuantity(mt_rand(0, 30)); // Quantité aléatoire entre 0 et 30
            $ticket->setCreatedAt(new DateTimeImmutable('now', $timezone));
            // Persister le ticket
            $manager->persist($ticket);
        }

        // Génération des tickets pour le premier et le dernier jour (vendredi et dimanche)
        foreach ($feeList as $fee => $price) {
            $ticket = new Ticket();
            $ticket->setTitle("Pass 3 JOURS $fee du " . $festivalStartDate->format('d/m/Y') . ' au ' . $festivalEndDate->format('d/m/Y'));
            $ticket->setStartAt($festivalEndDate->modify('-2 day'));
            $ticket->setEndAt($festivalEndDate);
            $ticket->setDuration(72);
            $ticket->setFee($fee);
            $ticket->setPrice($price * 2.5); // Prix le plus cher pour 3 jours
            $ticket->setQuantity(mt_rand(0, 30)); // Quantité aléatoire entre 0 et 30
            $ticket->setCreatedAt(new DateTimeImmutable('now', $timezone));
            // Persister le ticket
            $manager->persist($ticket);
        }

        // Flush tous les tickets persistés pour les sauvegarder dans la base de données
        $manager->flush();

        // user
        $userList = [
            [
                'role'      => ['ROLE_ADMIN'],
                'firstname' => 'Talya',
                'lastname'  => 'LALAOUI',
                'email'     => 'talya@ofestival.fr'
            ],
            [
                'role'      => ['ROLE_ADMIN'],
                'firstname' => 'Badri',
                'lastname'  => 'CHOULAK',
                'email'     => 'badri@ofestival.fr'
            ],
            [
                'role'      => ['ROLE_ADMIN'],
                'firstname' => 'Nicolas',
                'lastname'  => 'JOUBERT',
                'email'     => 'nicolas@ofestival.fr'
            ],
            [
                'role'      => ['ROLE_ADMIN'],
                'firstname' => 'Marjorie',
                'lastname'  => 'MARCOS',
                'email'     => 'marjorie@ofestival.fr'
            ],

        ];

        for ($i = 0; $i <= 3; $i++) {
            $user = new User();
            $user->setEmail($userList[$i]['email']);
            $user->setRoles($userList[$i]['role']);
            $user->setFirstname($userList[$i]['firstname']);
            $user->setLastname($userList[$i]['lastname']);
            $user->setPassword('$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO');
            $user->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
