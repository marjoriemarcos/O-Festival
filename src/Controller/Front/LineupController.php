<?php

namespace App\Controller\Front;

use App\Entity\Artist;
use App\Entity\Slot;
use App\Repository\SlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LineupController extends AbstractController
{
    #[Route('/programmation', name: 'lineupBrowse', methods: ['GET'])]
    public function lineupBrowse(SlotRepository $slotRepository): Response
    {   
        $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenre();
        dump($lineUpListList);
        return $this->render('front/lineup/browse.html.twig', [
            'lineUpListList' => $lineUpListList,
        ]);
    }

    // #[Route('/programmation/artiste/{id<\d+>}', name: 'artistRead', methods: ['GET'])]
    // public function artistRead(Artist $article): Response
    // {
    //     return $this->render('front/lineup/artist.html.twig', [
    //         'controller_name' => 'LineupController',
    //     ]);
    // }
}
