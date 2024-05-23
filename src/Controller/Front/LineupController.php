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
        $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenreAndStage();
        return $this->render('front/lineup/browse.html.twig', [
            'lineUpListList' => $lineUpListList,
        ]);
    }

    #[Route('/programmation/{id}', name: 'LineUpByDate', methods: ['GET'])]
    public function lineUpByDate(SlotRepository $slotRepository, $id): Response
    {   
        $days = [
            'J1' => '2024-08-23',
            'J2' => '2024-08-24',
            'J3' => '2024-08-25',
        ];

        if ($id == 'J0') {
            $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenreAndStage();
            if (!array_key_exists($id, $days)) {
                        throw $this->createNotFoundException('Le jour spécifié est invalide.');
            }
        }

        $date = $days[$id];
        $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenreAndStageByDay($date);

        return $this->render('front/lineup/browse.html.twig', [
            'lineUpListList' => $lineUpListList,
        ]);
    }

    #[Route('/programmation/stage/{id}', name: 'LineUpBystage', methods: ['GET'])]
    public function lineUpStage(SlotRepository $slotRepository, $id): Response
    {   
        $lineUpListList = $slotRepository->findAllSlotWithArtistAndGenreAndStageByStage($id);

        return $this->render('front/lineup/browse.html.twig', [
            'lineUpListList' => $lineUpListList,
        ]);
    }

    #[Route('/programmation/artiste/{id<\d+>}', name: 'artistRead', methods: ['GET'])]
    public function artistRead(SlotRepository $slotRepository, $id): Response
    {
        $artist = $slotRepository->findArtistWithSlotAndGenreAndStage($id);
        dump($artist);
        return $this->render('front/lineup/artist.html.twig', [
            'artist' => $artist,
        ]);
    }
}
