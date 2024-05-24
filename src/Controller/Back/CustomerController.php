<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CustomerRepository;

class CustomerController extends AbstractController
{
    #[Route('/back/customer_list', name: 'app_customer_list_admin')]
    public function list(CustomerRepository $customerRepository): Response
    {
        // Fetch customers
        // $customerList = $customerRepository->findAll();
        
        return $this->render('back/customer/list.html.twig', [
            // 'customerList' => $customerList,
        ]);
    }

    #[Route('/back/customer_list/{id}', name: 'app_customer_read_admin')]
    public function read(int $id, CustomerRepository $customerRepository): Response
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
