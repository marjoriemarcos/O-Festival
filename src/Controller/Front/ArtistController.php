<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Repository\GenreRepository;
use App\Repository\SlotRepository;
use App\Repository\StageRepository;
use App\Services\fetchDataFromRepo as ServicesFetchDataFromRepo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    /**
     * Affiche la liste des artistes avec des slots associés.
     *
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo Le serveice qui récupère les data depuis les repo
     * @return Response La réponse HTTP contenant la liste des artistes.
     */
    #[Route('/programmation', name: 'app_artist_browse')]
    public function browse(ServicesFetchDataFromRepo $fetchDataFromRepo): Response
    {
        // Récupération de toutes les data 
        $data = $fetchDataFromRepo->fetchDataFromRepo();

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Affiche les artistes associés à une date spécifique.
     *
     * @param string $date La date au format 'Y-m-d'.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo Le serveice qui récupère les data depuis les repo
     * @return Response La réponse HTTP contenant les artistes associés à la date.
     */
    #[Route('/programmation/{date}', name: 'app_artist_browse_by_date', methods: ['GET'])]
    public function browseByDate(string $date, ServicesFetchDataFromRepo $fetchDataFromRepo): Response 
        {
        // Récupération de toutes les data 
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
     * Affiche les artistes associés à une scène spécifique.
     *
     * @param int $stage id de la scène'.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo Le serveice qui récupère les data depuis les repo
     * @return Response La réponse HTTP contenant les artistes associés à une scène.
     */
    #[Route('/programmation/scene/{stage}', name: 'app_artist_browse_by_stage', methods: ['GET'])]
    public function browseByStage (int $stage, ServicesFetchDataFromRepo $fetchDataFromRepo): Response 
        {
        // Récupération de toutes les data 
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, null, $stage);

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Affiche les artistes associés à un genre spécifique.
     *
     * @param int $genre id de genre.
     * @param ServicesFetchDataFromRepo $fetchDataFromRepo Le serveice qui récupère les data depuis les repo
     * @return Response La réponse HTTP contenant les artistes associés à un genre.
     */
    #[Route('/programmation/genre/{genre}', name: 'app_artist_browse_by_genre', methods: ['GET'])]
    public function browseByGenre (int $genre, ServicesFetchDataFromRepo $fetchDataFromRepo ): Response 
        {
        // Récupération de toutes les data (slot, stage, artist et genre)
        $data = $fetchDataFromRepo->fetchDataFromRepo(null, $genre, null);

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $data['artistList'],
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList']
        ]);
    }

    /**
     * Affiche les détails d'un artiste avec des slots associés.
     *
     * @param int $id L'ID de l'artiste à afficher.
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @return Response La réponse HTTP contenant les détails de l'artiste.
     */
    #[Route('/programmation/artiste/{id}', name: 'app_artist_read', requirements: ['id' => '\d+'])]
    public function read(int $id, ArtistRepository $artistRepository): Response {
        // Récupération de l'artiste avec des slots associés par son ID
        $artist = $artistRepository->findArtistWithSlot($id);
        // Vérification si l'artiste existe
        if (!$artist) {
            // Lancer une exception si l'artiste n'existe pas
            throw $this->createNotFoundException('Cet artiste n\'est pas au programme!');
        }
        // Rendu du template pour afficher les détails de l'artiste
        return $this->render('front/artist/read.html.twig', [
            'artist' => $artist
        ]);
    }


}