<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/back/artist_list', name: 'artistBackBrowse')]
    public function artistBrowse(): Response
    {
        return $this->render('back/artist/index.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }

    #[Route('/back/artist_list/read', name: 'artistBackRead')]
    public function artistRead(): Response
    {
        return $this->render('back/artist/read.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }
}
