<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LineupController extends AbstractController
{
    #[Route('/programmation', name: 'lineupBrowse')]
    public function lineupBrowse(): Response
    {
        return $this->render('front/lineup/index.html.twig', [
            'controller_name' => 'LineupController',
        ]);
    }

    #[Route('/programmation/artiste', name: 'artistRead')]
    public function artistRead(): Response
    {
        return $this->render('front/lineup/artist.html.twig', [
            'controller_name' => 'LineupController',
        ]);
    }
}
