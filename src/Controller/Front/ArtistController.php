<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Services\fetchDataFromRepo as ServicesFetchDataFromRepo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    /**
     * Displays the list of artists with associated slots.
     *
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo The service that fetches data from the repositories
     * @return Response The HTTP response containing the list of artists.
     */
    #[Route('/programmation', name: 'app_artist_browse')]
    public function browse(ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Fetch all genres
        $data = $fetchDataFromRepo->fetchDataFromRepo();

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Displays the artists associated with a specific date.
     *
     * @param string $date The date in 'Y-m-d' format.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo The service that fetches data from the repositories
     * @return Response The HTTP response containing the artists associated with the date.
     */
    #[Route('/programmation/{date}', name: 'app_artist_browse_by_date', methods: ['GET'])]
    public function browseByDate(string $date, ServicesFetchDataFromRepo $fetchDataFromRepo)
    {
        $data = $fetchDataFromRepo->fetchDataFromRepo($date, null, null);
        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'date' => $date,
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Displays the artists associated with a specific stage.
     *
     * @param int $stage The ID of the stage.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo The service that fetches data from the repositories
     * @return Response The HTTP response containing the artists associated with the stage.
     */
    #[Route('/programmation/scene/{stage}', name: 'app_artist_browse_by_stage', methods: ['GET'])]
    public function browseByStage (int $stage, ServicesFetchDataFromRepo $fetchDataFromRepo): Response 
        {
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, null, $stage);

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Displays the artists associated with a specific genre.
     *
     * @param int $genre The ID of the genre.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo The service that fetches data from the repositories
     * @return Response The HTTP response containing the artists associated with the genre.
     */
    #[Route('/programmation/genre/{genre}', name: 'app_artist_browse_by_genre', methods: ['GET'])]
    public function browseByGenre (int $genre, ServicesFetchDataFromRepo $fetchDataFromRepo ): Response 
    {
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, $genre, null);

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Displays the details of an artist with associated slots.
     *
     * @param int $id The ID of the artist to display.
     * @param ArtistRepository $artistRepository The repository of the artists.
     * @return Response The HTTP response containing the artist's details.
     */
    #[Route('/programmation/artiste/{id}', name: 'app_artist_read', requirements: ['id' => '\d+'])]
    public function read(int $id, ArtistRepository $artistRepository): Response {
        // Fetch the artist with associated slots by their ID
        $artist = $artistRepository->findArtistWithSlot($id);
        // Check if the artist exists
        if (!$artist) {
            // Throw an exception if the artist does not exist
            throw $this->createNotFoundException('This artist is not in the program!');
        }
        // Render the template to display the artist's details
        return $this->render('front/artist/read.html.twig', [
            'artist' => $artist
        ]);
    }
	
}