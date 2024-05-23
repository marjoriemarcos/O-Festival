<?php

namespace App\Controller\Front;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main_home')]
    public function home(ArtistRepository $artistRepository): Response
    {
        // Récupérer tous les artistes à partir du référentiel
        $artistBrowse = $artistRepository->findAllArtistsWithSlot();

        return $this->render('front/main/home.html.twig', [
            'artistBrowse' => $artistBrowse
        ]);
    }
}
