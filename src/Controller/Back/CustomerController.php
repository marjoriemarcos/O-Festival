<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CustomerController extends AbstractController
{
    #[Route('/back/customer_list', name: 'customerBrowse')]
    public function customerBrowse(): Response
    {
        return $this->render('back/customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }

    #[Route('/back/customer_list/read', name: 'customerRead')]
    public function customerRead(): Response
    {
        return $this->render('back/customer/read.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }
}
