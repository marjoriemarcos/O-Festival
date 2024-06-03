<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TicketRepository;
use App\Form\TicketType;
use App\Entity\Ticket;

class TicketController extends AbstractController
{

    /**
     * @Route("/back/ticket", name="app_back_ticket_browse", methods={"GET"})
     * Method to display all tickets sorted by title
     */
    #[Route('/back/ticket', name: 'app_back_ticket_browse', methods: ['GET'])]
    public function browse(TicketRepository $ticketRepository): Response
    {
        // Retrieve all tickets sorted by title
        $ticketList = $ticketRepository->findBy([], ['title' => 'ASC']);

        // Render the view with the list of tickets
        return $this->render('back/ticket/browse.html.twig', [
            'ticketList' => $ticketList,
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}", name="app_back_ticket_read", methods={"GET"})
     * Method to display the details of a ticket by its ID
     */
    #[Route('/back/ticket/{id<\d+>}', name: 'app_back_ticket_read', methods: ['GET'])]
    public function read(int $id, TicketRepository $ticketRepository): Response
    {
        // Retrieve the ticket by its ID
        $ticket = $ticketRepository->find($id);

        // Check if the ticket exists
        if (!$ticket) {
            throw $this->createNotFoundException('The ticket does not exist.');
        }

        // Render the view with the ticket details
        return $this->render('back/ticket/read.html.twig', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * @Route("/back/ticket/add", name="app_back_ticket_add", methods={"GET", "POST"})
     * Method to add a new ticket
     */
    #[Route('/back/ticket/add', name: 'app_back_ticket_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager, TicketRepository $ticketRepository): Response
    {
        // Create a new Ticket instance
        $ticket = new Ticket();

        // Create the ticket creation form
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the new ticket and save it in the database
            $entityManager->persist($ticket);
            $entityManager->flush();

            // Add a success flash message and redirect to the tickets list
            $this->addFlash('success', 'Le billet a bien été créé.');
            return $this->redirectToRoute('app_back_ticket_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Render the ticket creation form view
        return $this->render('back/ticket/add.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}/edit", name="app_back_ticket_edit", methods={"GET", "POST"})
     * Method to edit an existing ticket
     */
    #[Route('/back/ticket/{id<\d+>}/edit', name: 'app_back_ticket_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticket $ticket, EntityManagerInterface $entityManager, TicketRepository $ticketRepository): Response
    {
        // Create the ticket edit form
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the modifications in the database
            $entityManager->flush();

            // Add a success flash message and redirect to the ticket details page
            $this->addFlash('success', 'Le billet a bien été modifié.');
            return $this->redirectToRoute('app_back_ticket_read', ['id' => $ticket->getId()], Response::HTTP_SEE_OTHER);
        }

        // Render the ticket edit form view
        return $this->render('back/ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}/delete", name="app_back_ticket_delete", methods={"POST"})
     * Method to delete an existing ticket
     */
    #[Route('/back/ticket/{id<\d+>}/delete', name: 'app_back_ticket_delete', methods: ['POST'])]
    public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $ticket->getId(), $request->request->get('_token'))) {
            // Remove the ticket from the database
            $entityManager->remove($ticket);
            $entityManager->flush();

            // Add a success flash message
            $this->addFlash('success', 'Le billet a été supprimé avec succès.');
        } else {
            // If the CSRF token is not valid, add an error flash message
            $this->addFlash('error', 'La suppression du billet a échoué. Le jeton CSRF est invalide.');
        }

        // Redirect to the tickets navigation page
        return $this->redirectToRoute('app_back_ticket_browse');
    }
}
