<?php

namespace App\Controller\Front;

use App\Entity\Artist;
use App\Entity\Slot;
use App\Repository\SlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LineupController extends AbstractController
{
    #[Route('/programmation', name: 'lineupBrowse', methods: ['GET'])]
    public function lineupBrowse(SlotRepository $slotRepository, Request $request): Response
    {   
        $date = $request->query->get('date');
        $genre = $request->query->get('genre');
        $stage = $request->query->get('stage');

        $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenreAndStageByParams($date, $genre, $stage);

        return $this->render('front/lineup/browse.html.twig', [
            'lineUpListList' => $lineUpListList,
        ]);
    }


    #[Route('/programmation/artiste/{id<\d+>}', name: 'artistRead', methods: ['GET'])]
    public function artistRead(SlotRepository $slotRepository, $id): Response
    {
        $artist = $slotRepository->findArtistWithSlotAndGenreAndStage($id);
        return $this->render('front/lineup/artist.html.twig', [
            'artist' => $artist,
        ]);
    }
}
