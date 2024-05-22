<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SlotController extends AbstractController
{
    #[Route('/back/slot_list', name: 'slotBrowse')]
    public function slotBrowse(): Response
    {
        return $this->render('back/slot/index.html.twig', [
            'controller_name' => 'SlotController',
        ]);
    }

    #[Route('/back/slot_list/read', name: 'slotRead')]
    public function slotRead(): Response
    {
        return $this->render('back/slot/read.html.twig', [
            'controller_name' => 'SlotController',
        ]);
    }
}
