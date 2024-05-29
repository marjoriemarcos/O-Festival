<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\fetchDataFromRepo as ServicesFetchDataFromRepo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    // Displays the home page
    #[Route('/', name: 'app_main_home')]
    public function home(
        ServicesFetchDataFromRepo $fetchDataFromRepo,
        TicketRepository $ticketRepository
    ): Response {
        // Fetch all data about artists, stages, genres, and slots
        $data = $fetchDataFromRepo->fetchDataFromRepo();

        // Initialize an array to store ticket durations
        $durations = [24, 48, 72];
        // Initialize an array to store passes
        $passes = [];

        // Iterate over each duration to fetch corresponding tickets
        foreach ($durations as $duration) {
            // Fetch tickets for the specified duration
            $tickets = $ticketRepository->findTicketsByDuration($duration);

            // Add tickets to the passes list
            $passes[] = [
                'data' => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' DAY(S)',
                'image' => 'pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }

        // Render the home page view with data
        return $this->render('front/main/home.html.twig', [
            'artistList' => $data['artistList'], 
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList'],
            'passes' => $passes
        ]);
    }
}
