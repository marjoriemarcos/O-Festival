<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SlotRepository;

class MainController extends AbstractController
{
    #[Route('/back', name: 'app_back_home')]
    public function home(SlotRepository $slotRepository): Response
    {
        // Fetch the slots from the database for each day
        $slotsDay1 = $slotRepository->findByDay('J1');
        $slotsDay2 = $slotRepository->findByDay('J2');
        $slotsDay3 = $slotRepository->findByDay('J3');

        // Render the home page template with the fetched slots for each day
        return $this->render('back/main/home.html.twig', [
            'slotsDay1' => $slotsDay1,
            'slotsDay2' => $slotsDay2,
            'slotsDay3' => $slotsDay3,
        ]);
    }
}
