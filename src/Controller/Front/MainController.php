<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home_front')]
    public function home_front(ArtistRepository $artistRepository): Response
    {
        // Récupérer tous les artistes à partir du référentiel
        $artistList = $artistRepository->findAllArtists();

        return $this->render('front/main/home.html.twig', [
            'controller_name' => 'MainController',
            'artistList' => $artistList
        ]);
    }
}
