<?php

namespace App\Controller\Front;

use App\Entity\Sponsor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SponsorRepository;

class SponsorController extends AbstractController
{
    #[Route('/partenaires', name: 'app_sponsor_browse')]
    public function index(SponsorRepository $sponsorRepository): Response
    {
        // Fetch all sponsors
        $sponsors = $sponsorRepository->findAll();

        return $this->render('front/sponsor/browse.html.twig', [
            'sponsors' => $sponsors,
        ]);
    }
}
