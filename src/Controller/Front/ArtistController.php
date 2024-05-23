<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Repository\SlotRepository;
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
    public function browse(ArtistRepository $artistRepository, SlotRepository $slotRepository): Response
    {
        // Récupération de tous les artistes avec des slots associés
        $artistBrowse = $artistRepository->findAllArtistsWithSlot();
        // Récupération de tous les slots
        $slots = $slotRepository->findAll();
        // Rendu du template pour afficher la liste des artistes
        return $this->render('front/artist/browse.html.twig', [
            "artistBrowse" => $artistBrowse,
            "slots" => $slots
        ]);
    }

    /**
     * Affiche les artistes associés à une date spécifique.
     *
     * @param string $date La date au format 'Y-m-d'.
     * @param ArtistRepository $artistRepository Le repository des artistes.
     * @param SlotRepository $slotRepository Le repository des slots.
     * @return Response La réponse HTTP contenant les artistes associés à la date.
     */
    #[Route('/programmation/{date}', name: 'app_artist_browse_by_date', methods: ['GET'])]
    public function browseByDate(
        $date,
        ArtistRepository $artistRepository,
        SlotRepository $slotRepository
    ): Response {
        $slots = $slotRepository->findAll();
        $artistBrowse = $artistRepository->findBySlotDate($date);
        return $this->render('front/artist/browse.html.twig', [
            'artistBrowse' => $artistBrowse,
            'date' => $date,
            "slots" => $slots
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