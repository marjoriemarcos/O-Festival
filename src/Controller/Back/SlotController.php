<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SlotRepository;

class SlotController extends AbstractController
{
    #[Route('/back/slot_list', name: 'slotBrowse')]
    public function slotBrowse(SlotRepository $slotRepository): Response
    {
        // Fetch slots
        $slotList = $slotRepository->findAll();

        return $this->render('back/slot/index.html.twig', [
            'slotList' => $slotList,
        ]);
    }

    #[Route('/back/slot_list/{id}', name: 'slotRead')]
    public function slotRead(int $id, SlotRepository $slotRepository): Response
    {
        // Fetch the slot by its ID
        $slot = $slotRepository->find($id);

        // Check if the slot exists
        if (!$slot) {
            throw $this->createNotFoundException('The slot does not exist.');
        }

        return $this->render('back/slot/read.html.twig', [
            'slot' => $slot,
        ]);
    }
}
