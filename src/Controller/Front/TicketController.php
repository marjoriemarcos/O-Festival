<?php

namespace App\Controller\Front;

use App\Repository\TicketRepository;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketController extends AbstractController
{
    #[Route('/billetterie', name: 'app_ticket_browse')]
    public function browse(TicketRepository $ticketRepository): Response
    {
        // Initialiser un tableau pour stocker les durées des billets
        $durations = [24, 48, 72];
        // Initialiser un tableau pour stocker les passes
        $passes = [];
        
        // Initialiser un formateur de dates en français
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Europe/Paris');

        // Boucler sur chaque durée pour récupérer les billets correspondants
        foreach ($durations as $duration) {
            // Récupérer les billets pour la durée spécifiée
            $tickets = $ticketRepository->findTicketsByDuration($duration);
            
            // Formater les dates pour chaque billet
            foreach ($tickets as $ticket) {
                $ticket->formattedStartAt = $formatter->format($ticket->getStartAt());
                $ticket->formattedEndAt = $formatter->format($ticket->getEndAt());
            }

            // Ajouter les billets à la liste des passes
            $passes[] = [
                'data' => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' JOUR(S)',
                'image' => '../images/pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }

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
