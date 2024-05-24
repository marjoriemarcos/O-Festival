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
                ->setName('Scène' . $i)
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
        $feeList = [
            'Normal'           => [
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-23'),
                    'price'    => 100,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 100,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-25'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 100,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 180,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 180,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 3J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 250,
                    'duration' => 72
                ]
            ],
            'Etudiant'         => [
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-23'),
                    'price'    => 80,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 80,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-25'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 80,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 150,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 150,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 3J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 220,
                    'duration' => 72
                ]
            ],
            'Enfant (-12 ans)' => [
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-23'),
                    'price'    => 0,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 0,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 1J',
                    'start'    => new DateTimeImmutable('2024-08-25'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 0,
                    'duration' => 24
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-24'),
                    'price'    => 0,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 2J',
                    'start'    => new DateTimeImmutable('2024-08-24'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 0,
                    'duration' => 48
                ],
                [
                    'title'    => 'Pass 3J',
                    'start'    => new DateTimeImmutable('2024-08-23'),
                    'end'      => new DateTimeImmutable('2024-08-25'),
                    'price'    => 0,
                    'duration' => 72
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
            // Mettre la durée dans $duration
            $duration = $fee['duration'];

            $ticket->setTitle($type . ' ' . $title . ' ' . $startDate->format('d-m-Y') . ' ' . $endDate->format('d-m-Y'));
            $ticket->setFee($type);
            $ticket->setCreatedAt(new DateTimeImmutable('now', $timezone));
            $ticket->addCustomer($customerList[array_rand($customerList)]);
            $ticket->setStartAt($startDate);
            $quantity = mt_rand(0, 10);
            $ticket->setQuantity($quantity);
            $price = ($price * $quantity);
            $ticket->setPrice($price);
            $ticket->setEndAt($endDate);
            $ticket->setDuration($duration);
            $manager->persist($ticket);
            $ticketList[] = $ticket;
        }

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
