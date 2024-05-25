<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SlotRepository;

class MainController extends AbstractController
{
    #[Route('/back', name: 'app_main_home_admin')]
    public function home(SlotRepository $slotRepository): Response
    {
        // Fetch the slots from the database
           $slotsDay1 = $slotRepository->findByDay('J1');
           $slotsDay2 = $slotRepository->findByDay('J2');
           $slotsDay3 = $slotRepository->findByDay('J3');
   
        return $this->render('back/main/home.html.twig', [
               'slotsDay1' => $slotsDay1,
               'slotsDay2' => $slotsDay2,
               'slotsDay3' => $slotsDay3,
        ]);
       
    }
}
