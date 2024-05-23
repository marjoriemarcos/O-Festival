<?php

namespace App\DataFixtures;

use App\DataFixtures\Providers\AppProvider;
use App\Entity\Artist;
use App\Entity\Customer;
use App\Entity\Genre;
use App\Entity\Ticket;
use App\Entity\User;
use App\Entity\Slot;
use App\Entity\Stage;
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
        for ($i = 0; $i < 4; $i++) {
            $stage = (new Stage())
                ->setName($faker->unique()->genreName())
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
                ->setVideo($faker->youtubeUri())
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

        $date = new DateTimeImmutable('2024-08-23');
        for ($l = 0; $l < 3; $l++) {
            foreach ($hour as $hourValue) {
                $slot = new Slot();
                $slot->setDate($date);
                $slot->setHour($hourValue);
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
                ->setPhoneNumber($faker->phoneNumber())
                ->setPostcode($faker->postcode())
                ->setTown($faker->city())
                ->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $manager->persist($customer);
            $customerList[] = $customer;
        }
   
      
        // Ticket 
        $feeList = [
            'Normal' => [
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-23'),
                    'price' => 100
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 100
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-25'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 100
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 180
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 180
                ],
                [
                    'title' => 'Pass 3J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 250
                ]
            ],
            'Etudiant' => [
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-23'),
                    'price' => 80
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 80
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-25'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 80
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 150
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 150
                ],
                [
                    'title' => 'Pass 3J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 220
                ]
            ],
            'Enfant (-12 ans)' => [
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-23'),
                    'price' => 0
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 0
                ],
                [
                    'title' => 'Pass 1J',
                    'start' => new DateTimeImmutable('2024-08-25'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 0
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-24'),
                    'price' => 0
                ],
                [
                    'title' => 'Pass 2J',
                    'start' => new DateTimeImmutable('2024-08-24'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 0
                ],
                [
                    'title' => 'Pass 3J',
                    'start' => new DateTimeImmutable('2024-08-23'),
                    'end' => new DateTimeImmutable('2024-08-25'),
                    'price' => 0
                ]
            ]
        ];


        $ticketList = [];
        for ($i = 0; $i < 50; $i++) {
            $ticket = new Ticket();

            // Sélectionne un type de billet aléatoire (Normal, Etudiant, Enfant)
            $type = array_rand($feeList);
            // Sélectionne un billet spécifique de ce type J1, J2 ...
            $fee = $feeList[$type][array_rand($feeList[$type])];
            // Mettre le titre dans $title
            $title = $fee['title'];
            // Mettre la date de départ dans $startDate
            $startDate = $fee['start'];
            // Mettre la date de fin dans $endDate
            $endDate = $fee['end'];
            // Mettre le prix dans $price
            $price = $fee['price'];

            $ticket->setTitle($type . ' ' . $title . ' ' . $startDate->format('d-m-Y') . ' ' . $endDate->format('d-m-Y'));
            $ticket->setFee($type . ' ' . $title . ' ' . $price);
            $ticket->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $ticket->addCustomer($customerList[array_rand($customerList)]);
            $ticket->setStartAt($startDate);
            $quantity = mt_rand(0, 10);
            $ticket->setQuantity($quantity);
            $price = ($price * $quantity);
            $ticket->setPrice($price);
            $ticket->setEndAt( $endDate);
            $manager->persist($ticket);
            $ticketList[] = $ticket;
        }        

        // user
        $userList = [
            [
                'role' => ['ROLE_ADMIN'],
                'firstname' => 'Talya',
                'lastname'  => 'LALAOUI',
                'email' => 'talya@ofestival.fr'
            ],
            [
                'role' => ['ROLE_ADMIN'],
                'firstname' => 'Badri',
                'lastname'  => 'CHOULAK',
                'email' => 'badri@ofestival.fr'
            ],
            [
                'role' => ['ROLE_ADMIN'],
                'firstname' => 'Nicolas',
                'lastname'  => 'JOUBERT',
                'email' => 'nicolas@ofestival.fr'
            ],
            [
                'role' => ['ROLE_ADMIN'],
                'firstname' => 'Marjorie',
                'lastname'  => 'MARCOS',
                'email' => 'marjorie@ofestival.fr'
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
