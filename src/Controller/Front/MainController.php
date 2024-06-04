<?php

namespace App\Controller\Front;

use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\fetchDataFromRepo as ServicesFetchDataFromRepo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main_home')]
    public function home(
        ServicesFetchDataFromRepo $fetchDataFromRepo,
        TicketRepository $ticketRepository
    ): Response {
        // Fetch data from repository service
        $data = $fetchDataFromRepo->fetchDataFromRepo();

        // Define pass durations
        $durations = [24, 48, 72];
        $passes = [];

        // Iterate through each duration to fetch corresponding tickets
        foreach ($durations as $duration) {
            $tickets = $ticketRepository->findTicketsByDuration($duration);

            // Prepare pass data
            $passes[] = [
                'data' => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' JOUR(S)',
                'image' => 'pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }

        // Render the homepage with fetched data and pass information
        return $this->render('front/main/home.html.twig', [
            'artistList' => $data['artistList'], 
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList'],
            'passes' => $passes
        ]);
    }
}
