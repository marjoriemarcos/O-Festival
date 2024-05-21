<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InfosController extends AbstractController
{
    #[Route('/infos-pratiques', name: 'infoBrowse')]
    public function infoBrowse(): Response
    {
        return $this->render('front/infos/index.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }

    #[Route('/infos-pratiques', name: 'sendRequest', methods: 'POST')]
    public function sendRequest(): Response
    {
        return $this->render('front/infos/index.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}
