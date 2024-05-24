<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StageRepository;

class StageController extends AbstractController
{
    #[Route('/back/stage_list', name: 'app_stage_list_admin')]
    public function list(StageRepository $stageRepository): Response
    {
        // Fetch stages
        $stageList = $stageRepository->findAll();
        return $this->render('back/stage/list.html.twig', [
            'stageList' => $stageList,
        ]);
    }
}
