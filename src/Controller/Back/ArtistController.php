<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArtistRepository;

class ArtistController extends AbstractController
{
    #[Route('/back/artist_list', name: 'artistBackBrowse')]
    public function artistBrowse(ArtistRepository $artistRepository): Response
    {
        // Fetch artists
        $artistList = $artistRepository->findAll();

        return $this->render('back/artist/index.html.twig', [
            'artistList' => $artistList,
        ]);
    }

    #[Route('/back/artist_list/{id}', name: 'artistBackRead')]
    public function artistRead(int $id, ArtistRepository $artistRepository): Response
    {
        // Fetch the artist by its ID
        $artist = $artistRepository->find($id);

        // Check if the artist exists
        if (!$artist) {
            throw $this->createNotFoundException('The artist does not exist.');
        }

        // Pass the artist to the view
        return $this->render('back/artist/read.html.twig', [
            'artist' => $artist,
        ]);
    }
}
