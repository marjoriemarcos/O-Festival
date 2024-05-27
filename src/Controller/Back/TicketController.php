<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TicketRepository;

class TicketController extends AbstractController
{
    #[Route('/back/ticket_list', name: 'app_ticket_list_admin')]
    public function list(TicketRepository $ticketRepository): Response
    {
        // Fetch tickets
        $ticketList = $ticketRepository->findAll();
        return $this->render('back/ticket/list.html.twig', [
            'ticketList' => $ticketList,
        ]);
    }

    #[Route('/back/ticket_list/{id}', name: 'app_ticket_read_admin')]
    public function read(int $id, TicketRepository $ticketRepository): Response
    {
        // Fetch the ticket by its ID
        $ticket = $ticketRepository->find($id);

        // Check if the ticket exists
        if (!$ticket) {
            throw $this->createNotFoundException('The ticket does not exist.');
        }

        return $this->render('back/ticket/read.html.twig', [
            'ticket' => $ticket,
        ]);
    }
}
