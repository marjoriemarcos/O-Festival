<?php

namespace App\DataFixtures\Providers;

class AppProvider

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
        "Salsa"
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
