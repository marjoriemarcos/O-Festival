<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GenreController extends AbstractController
{
    #[Route('/back/genre_list', name: 'genreBrowse')]
    public function genreBrowse(): Response
    {
        return $this->render('back/genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
   
}
