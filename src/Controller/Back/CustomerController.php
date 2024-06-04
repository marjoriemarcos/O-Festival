<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CustomerRepository;
use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Services\Weezevent;
use Knp\Component\Pager\PaginatorInterface;

class CustomerController extends AbstractController
{
    // Route to browse customers
    #[Route('/back/customer', name: 'app_back_customer_browse', methods: ['GET'])]
    public function browse(CustomerRepository $customerRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Retrieving search term from the request
        $search = $request->query->get('search');

        // Using the repository to get customers matching the search term
        $customerList = $customerRepository->findByLastNameSearch($search);

        // Paginating the obtained results
        $customerList = $paginator->paginate(
            $customerList, // Query builder with unpaged results
            $request->query->getInt('page', 1), // Current page number, default to 1
            5 // Number of items per page
        );

        // Rendering the template with the paginated list of customers and the search term
        return $this->render('back/customer/browse.html.twig', [
            'customerList' => $customerList, // Paginated list of customers
            'search' => $search, // Current search term to populate the search field
        ]);
    }

    // Route to read a specific customer
    #[Route('/back/customer/{id}', name: 'app_back_customer_read', methods: ['GET'])]
    public function read(int $id, CustomerRepository $customerRepository): Response
    {
        // Retrieving the customer by their ID
        $customer = $customerRepository->find($id);
        
        // Checking if the customer exists
        if (!$customer) {
            throw $this->createNotFoundException('The customer does not exist.');
        }

        // Rendering the template with the customer data
        return $this->render('back/customer/read.html.twig', [
            'customer' => $customer,
        ]);
    }

    // Route to delete a customer
    #[Route('/back/customer/{id<\d+>}/delete', name: 'app_back_customer_delete', methods: ['POST'])]
    public function delete(Request $request, Customer $customer, EntityManagerInterface $entityManager): Response
    {
        // Validating CSRF token
        if ($this->isCsrfTokenValid('delete' . $customer->getId(), $request->request->get('_token'))) {
            // Removing the customer from the database
            $entityManager->remove($customer);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le client a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du client a échoué. Le jeton CSRF est invalide.');
        }        
    
        // Redirecting to the customer browsing page
        return $this->redirectToRoute('app_back_customer_browse');
    }

    // Route to fetch customers from Weezevent API
    #[Route('/back/api/weezevent/customers', name: 'app_back_customer_fetch_api', methods: ['GET'])]
    public function fetchApi(Weezevent $weezevent)
    {   
        // Fetching customer orders list
        $content = $weezevent->fetchCustomerList();
        $customerList = $content['participants'];

        // Fetching ticket types list
        $ticketList = $weezevent->fetchTicketList();

        // Returning data in JSON format
        return new JsonResponse([
            'customerList' => $customerList,
            'ticketList' => $ticketList,
        ]);
    }

    // Route to browse customers via Weezevent API
    #[Route('/back/customer-weezevent', name: 'app_back_customer_browse_api', methods: ['GET'])]
    public function browseApi()
    {           
        return $this->render('back/customer/browse.api.html.twig', [
            // Data can be passed to the template if needed
        ]);
    
    }
}
