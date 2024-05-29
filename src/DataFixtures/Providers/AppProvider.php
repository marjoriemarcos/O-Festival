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


    private $pictures = [
        "https://images.pexels.com/photos/7020687/pexels-photo-7020687.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/5648438/pexels-photo-5648438.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6270140/pexels-photo-6270140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6173832/pexels-photo-6173832.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6270136/pexels-photo-6270136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6270265/pexels-photo-6270265.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/7086304/pexels-photo-7086304.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/7090876/pexels-photo-7090876.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6173807/pexels-photo-6173807.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/6670756/pexels-photo-6670756.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/4722551/pexels-photo-4722551.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/3807278/pexels-photo-3807278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/2531728/pexels-photo-2531728.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/1150837/pexels-photo-1150837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/1309240/pexels-photo-1309240.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/122635/pexels-photo-122635.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/3388899/pexels-photo-3388899.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/258732/pexels-photo-258732.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/442540/pexels-photo-442540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        "https://images.pexels.com/photos/417473/pexels-photo-417473.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
        'https://images.pexels.com/photos/3775132/pexels-photo-3775132.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/668278/pexels-photo-668278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/1460032/pexels-photo-1460032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/1036399/pexels-photo-1036399.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/2345342/pexels-photo-2345342.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/2364381/pexels-photo-2364381.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/814049/pexels-photo-814049.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/1083855/pexels-photo-1083855.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/2231755/pexels-photo-2231755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        'https://images.pexels.com/photos/1550469/pexels-photo-1550469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        
    ];


public function singers(): array
{
    return $this->singers;
}

public function genre(): array
{
    return $this->singers;
}

public function prictures(): array
{
    return $this->pictures;
}

public function singerName(): string
{
    return $this->singers[array_rand($this->singers)];
}

public function genreName(): string
{
    return $this->genres[array_rand($this->genres)];
}

public function singerPicture(): string
{
    return $this->pictures[array_rand($this->pictures)];
}
}
