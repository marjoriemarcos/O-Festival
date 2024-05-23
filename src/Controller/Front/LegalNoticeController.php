<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegalNoticeController extends AbstractController
{
    #[Route('/cgv', name: 'legalNoticeBrowse')]
    public function legalNoticeBrowse(): Response
    {
        return $this->render('front/legal_notice/index.html.twig', [
            'controller_name' => 'LegalNoticeController',
        ]);
    }
}
