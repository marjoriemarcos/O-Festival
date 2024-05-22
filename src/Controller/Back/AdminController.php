<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/back/admin_list', name: 'adminBrowse')]
    public function adminBrowse(): Response
    {
        return $this->render('back/admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
