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

        $tickets= $ticketRepository->findAll();

        return $this->render('front/ticket/browse.html.twig', [
            'tickets' => $tickets,
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
