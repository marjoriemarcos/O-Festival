<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketController extends AbstractController
{
    #[Route('/billetterie', name: 'ticketBrowse')]
    public function ticketBrowse(): Response
    {
        return $this->render('front/ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }

    #[Route('/billetterie', name: 'ticketAdd', methods: 'POST')]
    public function ticketAdd(): Response
    {
        return $this->render('front/ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }

}
