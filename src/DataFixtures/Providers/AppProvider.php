<?php

namespace App\DataFixtures\Providers;

class AppProvider extends \Faker\Provider\Base

{
    // singers
    private $singers = [
        'Freddie Mercury',
        'Aretha Franklin',
        'Michael Jackson',
        'Whitney Houston',
        'Elvis Presley',
        'Beyoncé',
        'Frank Sinatra',
        'Adele',
        'Bob Marley',
        'Taylor Swift',
        'John Lennon',
        'Madonna',
        'Stevie Wonder',
        'Prince',
        'Mariah Carey',
        'Elton John',
        'Rihanna',
        'David Bowie',
        'Paul McCartney',
        'Celine Dion',
        'Lompale',
        'The Blaze',
        'Korn',
        'Angèle',
        'Aya Nakamura',
        'Vianney',
        'Clara Luciani',
        'Sliman',
        'Juliette Armanet',
        'Benjamin Biolay',
        'Billie Eilish',
        'Taylor Swift',
        'The Weeknd',
        'Ariana Grande',
        'Post Malone',
        'Drake',
        'Kayne West',
        'Adele',
        'Sabrina Carpenter',
        'Dua Lipa',
        'Harry Style',
        'Megan Thee Stallion',
        'Lady Gaga',
        'Justin Bieber',
        'Kendrick Lamar',
        'Lizzo',
        'Travis Scott',
        'Doja Cat',
        'The kid Larol',
        'Olivia Rodrigo',
        'Machine Gun Kelly',
        'Halsey',
        'Miley Cyrus',
        'Lil Nas X',
        'BTS',
    ];

    // singers
    private $genres = [
        "Rock",
        "Jazz",
        "Blues",
        "Pop",
        "Rap",
        "Classique",
        "Électronique",
        "Reggae",
        "Country",
        "Folk",
        "Métal",
        "Punk",
        "Disco",
        "Hip-hop",
        "Soul",
        "Funk",
        "House",
        "Techno",
        "RnB (Rhythm and Blues)",
        "Salsa",
        'India Rock',
        'Grunge',
        'Dream Pop',
        'Shoegaze',
        'Post-Punk',
        'Electroclash',
        'Folktronica',
        'Experimental Rock',
        'Noise Rock',
        'Lo-fi Indie',
    ];


    public function singers(): array
    {
        return $this->singers;
    }

    public function genre(): array
    {
        return $this->singers;
    }

    public function singerName(): string
    {
        return $this->singers[array_rand($this->singers)];
    }

    public function genreName(): string
    {
        return $this->genres[array_rand($this->genres)];
    }
}
