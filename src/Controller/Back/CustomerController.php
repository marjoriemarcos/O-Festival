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
        // Récupération du terme de recherche depuis la requête
        $search = $request->query->get('search');

        // Utilisation du repository pour obtenir les clients correspondant au terme de recherche
        $customerList = $customerRepository->findByLastNameSearch($search);

        // Paginer les résultats obtenus
        $customerList = $paginator->paginate(
            $customerList, // Query builder avec les résultats non paginés
            $request->query->getInt('page', 1), // Numéro de la page actuelle, par défaut 1
            5 // Nombre d'éléments par page
        );

        // Rendu du template avec la liste paginée des clients et le terme de recherche
        return $this->render('back/customer/browse.html.twig', [
            'customerList' => $customerList, // Liste paginée des clients
            'search' => $search, // Terme de recherche actuel pour remplir le champ de recherche
        ]);
    }

    #[Route('/back/customer/{id}', name: 'app_back_customer_read', methods: ['GET'])]
    public function read(int $id, CustomerRepository $customerRepository): Response
    {
        // Récupère le client par son ID
        $customer = $customerRepository->find($id);
        
        // Vérifie si le client existe
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
    {   
        // Va chercher la liste des commandes des clients
        $content = $weezevent->fetchCustomerList();
        $customerList = $content['participants'];

        // Va chercher la liste de types de billets
        $ticketList = $weezevent->fetchTicketList();

        return $this->render('back/customer/browse.api.html.twig', [
            'customerList' => $customerList,
            'ticketList' => $ticketList,
        ]);
    
    }
}