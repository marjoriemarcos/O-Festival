<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CustomerRepository;
use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Services\weezevent;
use Knp\Component\Pager\PaginatorInterface;


class CustomerController extends AbstractController
{
    #[Route('/back/customer', name: 'app_back_customer_browse', methods: ['GET'])]
    public function browse(CustomerRepository $customerRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Create QueryBuilder to fetch customers and their tickets
        $queryBuilder = $customerRepository->createQueryBuilder('c')
            ->select('c, t') // Select customers and their tickets
            ->leftJoin('c.tickets', 't') // Join tickets
            ->orderBy('c.lastname', 'ASC'); // Order by customer lastname
    
        // Get the query from QueryBuilder
        $query = $queryBuilder->getQuery();
    
        // Paginate the query
        $customerList = $paginator->paginate(
            $query, 
            $request->query->getInt('page', 1),
            5 // Limit per page
        );
    
        // Render the template with the paginated list
        return $this->render('back/customer/browse.html.twig', [
            'customerList' => $customerList,
        ]);
    }

    #[Route('/back/customer/{id}', name: 'app_back_customer_read', methods: ['GET'])]
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

    #[Route('/back/customer/{id<\d+>}/delete', name: 'app_back_customer_delete', methods: ['POST'])]
    public function delete(Request $request, Customer $customer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $customer->getId(), $request->request->get('_token'))) {
            $entityManager->remove($customer);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le client a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du client a échoué. Le jeton CSRF est invalide.');
        }        
    
        return $this->redirectToRoute('app_back_customer_browse');
    }


    #[Route('/back/customer-api', name: 'app_back_customer_browse_api', methods: ['GET'])]
    public function browseApi(weezevent $weezevent)
    {   // Va chercher la liste des commandes des client
        $content = $weezevent->fetchCustomerList();
        $customerList = $content['participants'];

        // Va chercher la liste de type de billets
        $ticketList = $weezevent->fetchTicketList();

        return $this->render('back/customer/browse.api.html.twig', [
        'customerList' => $customerList,
        'ticketList' => $ticketList,
        ]);
    
    }
}
