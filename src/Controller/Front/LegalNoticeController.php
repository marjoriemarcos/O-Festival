<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegalNoticeController extends AbstractController
{
    #[Route('/mentions-légales', name: 'app_legal_notice_browse')]
    public function browse(): Response
    {
        return $this->render('front/legal_notice/browse.html.twig', [
            'controller_name' => 'LegalNoticeController',
        ]);
    }
}
