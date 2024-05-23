<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InfosController extends AbstractController
{
    #[Route('/infos-pratiques', name: 'app_infos_browse')]
    public function browse(): Response
    {
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }

    #[Route('/infos-pratiques', name: 'app_infos_send_request', methods: 'POST')]
    public function sendRequest(): Response
    {
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}
