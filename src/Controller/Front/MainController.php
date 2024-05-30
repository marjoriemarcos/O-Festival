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
        $data = $fetchDataFromRepo->fetchDataFromRepo();

        $durations = [24, 48, 72];
        $passes = [];

        foreach ($durations as $duration) {
            $tickets = $ticketRepository->findTicketsByDuration($duration);

            $passes[] = [
                'data' => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' DAY(S)',
                'image' => 'pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }

        return $this->render('front/main/home.html.twig', [
            'artistList' => $data['artistList'], 
            'slots' => $data['slotList'],
            'stageList' => $data['stageList'],
            'genreList' => $data['genreList'],
            'passes' => $passes
        ]);
    }
}