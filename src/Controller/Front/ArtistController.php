<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Repository\GenreRepository;
use App\Repository\SlotRepository;
use App\Repository\StageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    /**
     * Affiche la liste des artistes avec des slots associés.
     *
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @param SlotRepository $slotRepository Le repository des slots.
     * @return Response La réponse HTTP contenant la liste des artistes.
     */
    #[Route('/programmation', name: 'app_artist_browse')]
    public function browse(
        ArtistRepository $artistRepository, 
        SlotRepository $slotRepository,
        StageRepository $stageRepository,
        GenreRepository $genreRepository): Response
    {
        // Récupération de tous les artistes avec des slots associés
        $artistBrowse = $artistRepository->findAllArtistBySlot();
        // Récupération de tous les slots
        $slots = $slotRepository->findAll();
        // Récupération de tous les stages
        $stageList = $stageRepository->findAll();
        // Récupération de 4 les genre
        $genreList = $genreRepository->limitedGenre();

        return $this->render('front/artist/browse.html.twig', [
            "artistBrowse" => $artistBrowse,
            "slots" => $slots,
            'stageList' => $stageList,
            'genreList' => $genreList
        ]);
    }

    /**
     * Affiche les artistes associés à une date spécifique.
     *
     * @param string $date La date au format 'Y-m-d'.
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @param StageRepository $stageRepository Le repository des stage.
     * @param SlotRepository $slotRepository Le repository des dates.
     * @param GenreRepository $genreRepository Le repository des genres. 
     * @return Response La réponse HTTP contenant les artistes associés à la date.
     */
    #[Route('/programmation/{date}', name: 'app_artist_browse_by_date', methods: ['GET'])]
    public function browseByDate( $date, ArtistRepository $artistRepository,SlotRepository $slotRepository): Response {
        $slots = $slotRepository->findAll();
        $stageList = $stageRepository->findAll();
        $genreList = $genreRepository->limitedGenre();
        $artistBrowse = $artistRepository->findAllArtistByParams($date, null, null);
        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $artistBrowse,
            'date' => $date,
            "slots" => $slots,
            'stageList' => $stageList,
            'genreList' => $genreList
        ]);
    }

    /**
     * Affiche les artistes associés à une scène spécifique.
     *
     * @param int $stage id de la scène'.
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @param StageRepository $stageRepository Le repository des stage.
     * @param SlotRepository $slotRepository Le repository des dates.
     * @param GenreRepository $genreRepository Le repository des genres. 
     * @return Response La réponse HTTP contenant les artistes associés à une scène.
     */
    #[Route('/programmation/scene/{stage}', name: 'app_artist_browse_by_stage', methods: ['GET'])]
    public function browseByStage (
        int $stage, 
        ArtistRepository $artistRepository,
        SlotRepository $slotRepository,
        StageRepository $stageRepository,
        GenreRepository $genreRepository): Response 
        {
        $slots = $slotRepository->findAll();
        $stageList = $stageRepository->findAll();
        $genreList = $genreRepository->limitedGenre();
        $artistBrowse = $artistRepository->findAllArtistByParams(null, null, $stage);
        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $artistBrowse,
            "slots" => $slots,
            'stageList' => $stageList,
            'genreList' => $genreList
            
        ]);
    }

    /**
     * Affiche les artistes associés à un genre spécifique.
     *
     * @param int $genre id de genre.
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @param StageRepository $stageRepository Le repository des stage.
     * @param SlotRepository $slotRepository Le repository des dates.
     * @param GenreRepository $genreRepository Le repository des genres. 
     * @return Response La réponse HTTP contenant les artistes associés à un genre.
     */
    #[Route('/programmation/genre/{genre}', name: 'app_artist_browse_by_genre', methods: ['GET'])]
    public function browseByGenre (
        int $genre, 
        ArtistRepository $artistRepository,
        SlotRepository $slotRepository,
        StageRepository $stageRepository,
        GenreRepository $genreRepository ): Response 
        {
        $slots = $slotRepository->findAll();
        $stageList = $stageRepository->findAll();
        $genreList = $genreRepository->limitedGenre();
        $artistBrowse = $artistRepository->findAllArtistByParams(null, $genre, null);

        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $artistBrowse,
            "slots" => $slots,
            'stageList' => $stageList,
            'genreList' => $genreList
            
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
    public function read(
        int $id,
        ArtistRepository $artistRepository
    ): Response {
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