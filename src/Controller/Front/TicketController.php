<?php

namespace App\Controller\Front;

use App\Repository\TicketRepository;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketController extends AbstractController
{
    // Displays the ticket page
    #[Route('/billetterie', name: 'app_ticket_browse')]
    public function browse(TicketRepository $ticketRepository): Response
    {
        // Initialize an array to store passes
        $passes = [];

        // Initialize a date formatter for French locale
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Europe/Paris');

        // Fetch tickets for different durations and format their dates
        foreach ([24, 48, 72] as $duration) {
            // Fetch tickets for the specified duration
            $tickets = $ticketRepository->findTicketsByDuration($duration);

            // Format dates for each ticket
            foreach ($tickets as $ticket) {
                $ticket->setFormattedStartAt($formatter->format($ticket->getStartAt()));
                $ticket->setFormattedEndAt($formatter->format($ticket->getEndAt()));
            }

            // Add tickets to the passes list
            $passes[] = [
                'data'  => $tickets,
                'title' => 'PASS ' . ($duration / 24) . ' JOUR(S)',
                'image' => 'pass-' . ($duration / 24) . '-jours.jpg',
            ];
        }

        // Pass data to the view
        return $this->render('front/ticket/browse.html.twig', [
            'passes' => $passes,
        ]);
    }

    // Placeholder method for adding tickets (currently not implemented)
    #[Route('/billetterie', name: 'app_ticket_add', methods: 'POST')]
    public function add(): Response
    {
        // Placeholder method, currently not implemented
        return $this->render('front/ticket/browse.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
}
