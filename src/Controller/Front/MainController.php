<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main_home')]
    public function home(ArtistRepository $artistRepository, TicketRepository $ticketRepository): Response
    {
        // Récupérer tous les artistes avec les scènes, les genres et les slot
        $artistBrowse = $artistRepository->findAllArtistByParams();

        // Initialiser un tableau pour stocker les durées des billets
        $durations = [24, 48, 72];
        // Initialiser un tableau pour stocker les passes
        $passes = [];

        // Boucler sur chaque durée pour récupérer les billets correspondants
        foreach ($durations as $duration) {
            // Récupérer les billets pour la durée spécifiée
            $tickets = $ticketRepository->findTicketsByDuration($duration);

            // Ajouter les billets à la liste des passes
            $passes[] = [
                'data' => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' JOUR(S)',
                'image' => '../images/pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }
        return $this->render('front/main/home.html.twig', [
            'artistBrowse' => $artistBrowse,
            'passes' => $passes
        ]);
    }
}
