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
     * Méthode pour afficher tous les billets triés par titre
     */
    #[Route('/back/ticket', name: 'app_back_ticket_browse', methods: ['GET'])]
    public function browse(TicketRepository $ticketRepository): Response
    {
        // Récupère tous les billets triés par titre
        $ticketList = $ticketRepository->findBy([], ['title' => 'ASC']);

        // Rend la vue avec la liste des billets
        return $this->render('back/ticket/browse.html.twig', [
            'ticketList' => $ticketList,
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}", name="app_back_ticket_read", methods={"GET"})
     * Méthode pour afficher les détails d'un billet par son ID
     */
    #[Route('/back/ticket/{id<\d+>}', name: 'app_back_ticket_read', methods: ['GET'])]
    public function read(int $id, TicketRepository $ticketRepository): Response
    {
        // Récupère le billet par son ID
        $ticket = $ticketRepository->find($id);

        // Vérifie si le billet existe
        if (!$ticket) {
            throw $this->createNotFoundException('The ticket does not exist.');
        }

        // Rend la vue avec les détails du billet
        return $this->render('back/ticket/read.html.twig', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * @Route("/back/ticket/add", name="app_back_ticket_add", methods={"GET", "POST"})
     * Méthode pour ajouter un nouveau billet
     */
    #[Route('/back/ticket/add', name: 'app_back_ticket_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager, TicketRepository $ticketRepository): Response
    {
        // Crée une nouvelle instance de Ticket
        $ticket = new Ticket();

        // Crée le formulaire de création de billet
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Génère le titre réel du billet
            // $dataFromForm = $form->getData();
            // $realTitle = $dataFromForm->setRealTitle();
            // $ticket->setTitle($realTitle);

            // Vérifie si un billet avec ce titre existe déjà
            // $existingTicket = $ticketRepository->findOneBy(['title' => $realTitle]);

            // if ($existingTicket) {
            //     $this->addFlash('danger', 'Ce billet existe déjà!');
            //     return $this->redirectToRoute('app_back_ticket_add', [], Response::HTTP_SEE_OTHER);
            // }

            // Persiste le nouveau billet et enregistre dans la base de données
            $entityManager->persist($ticket);
            $entityManager->flush();

            // Ajoute un message flash de succès et redirige vers la liste des billets
            $this->addFlash('success', 'Le billet a bien été créé.');
            return $this->redirectToRoute('app_back_ticket_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Rend la vue du formulaire de création de billet
        return $this->render('back/ticket/add.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}/edit", name="app_back_ticket_edit", methods={"GET", "POST"})
     * Méthode pour éditer un billet existant
     */
    #[Route('/back/ticket/{id<\d+>}/edit', name: 'app_back_ticket_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticket $ticket, EntityManagerInterface $entityManager, TicketRepository $ticketRepository): Response
    {
        // Crée le formulaire d'édition de billet
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            
            // Enregistre les modifications dans la base de données
            $entityManager->flush();

            // Ajoute un message flash de succès et redirige vers la page de détails du billet
            $this->addFlash('success', 'Le billet a bien été modifié.');
            return $this->redirectToRoute('app_back_ticket_read', ['id' => $ticket->getId()], Response::HTTP_SEE_OTHER);
        }

        // Rend la vue du formulaire d'édition de billet
        return $this->render('back/ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/back/ticket/{id<\d+>}/delete", name="app_back_ticket_delete", methods={"POST"})
     * Méthode pour supprimer un billet existant
     */
    #[Route('/back/ticket/{id<\d+>}/delete', name: 'app_back_ticket_delete', methods: ['POST'])]
    public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        // Vérifie si le jeton CSRF est valide
        if ($this->isCsrfTokenValid('delete' . $ticket->getId(), $request->request->get('_token'))) {
            // Supprime le billet de la base de données
            $entityManager->remove($ticket);
            $entityManager->flush();

            // Ajoute un message flash de succès
            $this->addFlash('success', 'Le billet a été supprimé avec succès.');
        } else {
            // Si le jeton CSRF n'est pas valide, ajoute un message flash d'erreur
            $this->addFlash('error', 'La suppression du billet a échoué. Le jeton CSRF est invalide.');
        }

        // Redirige vers la page de navigation des billets
        return $this->redirectToRoute('app_back_ticket_browse');
    }
}
