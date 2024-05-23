<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StageController extends AbstractController
{
    #[Route('/back/stage_list', name: 'stageBrowse')]
    public function stageBrowse(): Response
    {
        return $this->render('back/stage/index.html.twig', [
            'controller_name' => 'StageController',
        ]);
    }
}
