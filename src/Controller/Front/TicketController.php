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
        $pass1 = $ticketRepository->findDistinctFeesByDuration(0);
        $pass2 = $ticketRepository->findDistinctFeesByDuration(1);
        $pass3 = $ticketRepository->findDistinctFeesByDuration(2);

        return $this->render('front/ticket/browse.html.twig', [
            'pass1' => $pass1,
            'pass2' => $pass2,
            'pass3' => $pass3,
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
