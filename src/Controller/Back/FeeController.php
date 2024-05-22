<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FeeController extends AbstractController
{
    #[Route('/back/fee_list', name: 'feeBrowse')]
    public function feeBrowse(): Response
    {
        return $this->render('back/fee/index.html.twig', [
            'controller_name' => 'FeeController',
        ]);
    }
}
