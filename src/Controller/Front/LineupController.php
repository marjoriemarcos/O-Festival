<?php

namespace App\Controller\Front;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LineupController extends AbstractController
{
    #[Route('/programmation', name: 'lineupBrowse')]
    public function lineupBrowse(ArtistRepository $artistRepository): Response
    {

        // Récupérer tous les artistes à partir du référentiel
        $artistList = $artistRepository->findArtistsWithSlots();

        return $this->render('front/lineup/index.html.twig', [
            'controller_name' => 'LineupController',
            "artistList" => $artistList
        ]);
    }

    #[Route('/programmation/artiste/{id}', name: 'artistRead', requirements: ['id' => '\d+'])]
    public function artistRead(Artist $artist): Response
    {
        return $this->render('front/lineup/artist.html.twig', [
            "artist" => $artist
        ]);
    }
}
