<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CustomerRepository;
use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ContactRepository;

class CustomerController extends AbstractController
{
    #[Route('/back/customer_list', name: 'app_customer_list_admin')]
    public function list(CustomerRepository $customerRepository): Response
    {
        $customerList = $customerRepository->findAll();
        
        return $this->render('back/customer/list.html.twig', [
        'customerList' => $customerList,

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

    #[Route('/back/customer_list/{id<\d+>}/delete', name: 'app_customer_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Customer $customer, EntityManagerInterface $entityManager): Response
    {
        var_dump($request->request->all());
        if ($this->isCsrfTokenValid('delete' . $customer->getId(), $request->request->get('_token'))) {
            $entityManager->remove($customer);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le client a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du client a échoué. Le jeton CSRF est invalide.');
        }        
    
        return $this->redirectToRoute('app_customer_list_admin');
    }
}
