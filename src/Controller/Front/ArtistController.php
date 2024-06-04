<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Services\fetchDataFromRepo as ServicesFetchDataFromRepo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    // Private method to render the artists template
    private function renderArtists(array $data): Response
    {
        return $this->render('front/artist/browse.html.twig', [
            'artistList' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    // Displays the list of artists with associated slots, stages, and genres
    #[Route('/programmation', name: 'app_artist_browse')]
    public function browse(ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Fetch all data
        $data = $fetchDataFromRepo->fetchDataFromRepo();
        return $this->renderArtists($data);
    }

    // Displays the artists associated with a specific date
    #[Route('/programmation/{date}', name: 'app_artist_browse_by_date', methods: ['GET'])]
    public function browseByDate(string $date, ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Fetch data filtered by date
        $data = $fetchDataFromRepo->fetchDataFromRepo($date);
        return $this->renderArtists($data);
    }

    // Displays the artists associated with a specific stage
    #[Route('/programmation/scene/{stage}', name: 'app_artist_browse_by_stage', methods: ['GET'])]
    public function browseByStage(int $stage, ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Fetch data filtered by stage
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, null, $stage);
        return $this->renderArtists($data);
    }

    // Displays the artists associated with a specific genre
    #[Route('/programmation/genre/{genre}', name: 'app_artist_browse_by_genre', methods: ['GET'])]
    public function browseByGenre(int $genre, ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Fetch data filtered by genre
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, $genre);
        return $this->renderArtists($data);
    }

    // Displays the details of an artist with associated slots
    #[Route('/programmation/artiste/{id}', name: 'app_artist_read', requirements: ['id' => '\d+'])]
    public function read(int $id, ArtistRepository $artistRepository): Response
    {
        // Fetch the artist with associated slots by their ID
        $artist = $artistRepository->findArtistBySlot($id);
        
        // Check if the artist exists
        if (!$artist) {
            // Throw an exception if the artist does not exist
            throw $this->createNotFoundException('Cet artiste n\'existe pas.');
        }

        // Render the template to display the artist's details
        return $this->render('front/artist/read.html.twig', [
            'artist' => $artist
        ]);
    }
}
