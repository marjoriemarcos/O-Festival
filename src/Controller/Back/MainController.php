<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/back', name: 'app_main_home_admin')]
    public function home(): Response
    {
        return $this->render('back/main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
