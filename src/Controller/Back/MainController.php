<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/back', name: 'home_back')]
    public function index(): Response
    {
        return $this->render('back/main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
