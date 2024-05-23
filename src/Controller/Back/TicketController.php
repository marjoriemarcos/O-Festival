<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketController extends AbstractController
{
    #[Route('/back/ticket_list', name: 'ticketBackBrowse')]
    public function ticketBrowse(): Response
    {
        return $this->render('back/ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }

    #[Route('/back/ticket_list/read', name: 'ticketBackRead')]
    public function ticketRead(): Response
    {
        return $this->render('back/ticket/read.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
}
