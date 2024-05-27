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
    #[Route('/back/ticket_list', name: 'app_ticket_list_admin', methods: ['GET'])]
    public function list(TicketRepository $ticketRepository): Response
    {
        // Fetch tickets
        $ticketList = $ticketRepository->findAll();

        return $this->render('back/ticket/list.html.twig', [
            'ticketList' => $ticketList,
        ]);
    }

    #[Route('/back/ticket_list/{id<\d+>}', name:'app_ticket_read_admin', methods: ['GET'])]
    public function read(int $id, TicketRepository $ticketRepository): Response
    {
        // Fetch the ticket by its ID
        $ticket = $ticketRepository->find($id);

        // Check if the ticket exists
        if (!$ticket) {
            throw $this->createNotFoundException('The ticket does not exist.');
        }

        return $this->render('back/ticket/read.html.twig', [
            'ticket' => $ticket,
        ]);
    }
    #[Route('/back/ticket_list/new', name: 'app_ticket_new_admin', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticket);
            $entityManager->flush();
    
            $this->addFlash('success', 'The ticket has been created successfully.');
            return $this->redirectToRoute('app_ticket_list_admin', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('back/ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/ticket_list/{id<\d+>}/edit', name: 'app_ticket_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            $this->addFlash('success', 'The ticket has been updated successfully.');
            return $this->redirectToRoute('app_ticket_list_admin', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('back/ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }
    

    #[Route('/back/ticket_list/{id<\d+>}/delete', name: 'app_ticket_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        var_dump($request->request->all());
        if ($this->isCsrfTokenValid('delete' . $ticket->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ticket);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
        }        
    
        return $this->redirectToRoute('app_ticket_list_admin');
    }

    
}
