<?php

namespace App\Controller\Front;

use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketController extends AbstractController
{
    #[Route('/billetterie', name: 'app_ticket_browse')]
    public function browse(TicketRepository $ticketRepository): Response
    {
        // Préparer les passes avec leurs données associées
        $passes = [
            [
                'data' => $ticketRepository->findDistinctFeesByDuration(0),
                'title' => 'PASS 1 JOUR',
                'image' => '../images/pass-1-jour.jpg',
                'duration' => ' Vendredi 23 août - Samedi 24 août - Dimanche 25 août -'
            ],
            [
                'data' => $ticketRepository->findDistinctFeesByDuration(1),
                'title' => 'PASS 2 JOURS',
                'image' => '../images/pass-2-jours.jpg',
                'duration' => 'du Samedi 24 août au Dimanche 25 août'
            ],
            [
                'data' => $ticketRepository->findDistinctFeesByDuration(2),
                'title' => 'PASS 3 JOURS',
                'image' => '../images/pass-3-jours.jpg',
                'duration' => 'du Vendredi 23 août au Dimanche 25 août'
            ]
        ];
    
        // Transmettre les données à la vue
        return $this->render('front/ticket/browse.html.twig', [
            'passes' => $passes,
        ]);
    }

    #[Route('/billetterie', name: 'app_ticket_add', methods: 'POST')]
    public function add(): Response
    {
        return $this->render('front/ticket/browse.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
}
