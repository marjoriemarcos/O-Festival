<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\GenreRepository;

class GenreController extends AbstractController
{
    #[Route('/back/genre_list', name: 'genreBrowse')]
    public function genreBrowse(GenreRepository $genreRepository): Response
    {
        // Fetch genres
        $genreList = $genreRepository->findAll();
        return $this->render('back/genre/index.html.twig', [
            'genreList' => $genreList,
        ]);
    }
   
}
