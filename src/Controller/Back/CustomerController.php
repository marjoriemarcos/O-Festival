<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CustomerRepository;

class CustomerController extends AbstractController
{
    #[Route('/back/customer_list', name: 'customerBrowse')]
    public function customerBrowse(CustomerRepository $customerRepository): Response
    {
        // Fetch customers
        $customerList = $customerRepository->findAll();
        
        return $this->render('back/customer/list.html.twig', [
             'customerList' => $customerList,
        ]);
    }

    #[Route('/back/customer_list/{id}', name: 'customerRead')]
    public function customerRead(int $id, CustomerRepository $customerRepository): Response
    {
        // Fetch the customer by its ID
        $customer = $customerRepository->find($id);
        
        // Check if the customer exists
        if (!$customer) {
            throw $this->createNotFoundException('The customer does not exist.');
        }

        return $this->render('back/customer/read.html.twig', [
            'customer' => $customer,
        ]);
    }
}
