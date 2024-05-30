<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SlotRepository;
use App\Form\SlotType;
use App\Entity\Slot;

class SlotController extends AbstractController
{
    #[Route('/back/slot', name: 'app_back_slot_browse', methods: ['GET'])]
    public function browse(SlotRepository $slotRepository): Response
    {
        // Récupère tous les slots triés par date puis par heure avec les relations préchargées
        $slotList = $slotRepository->findAllSorted();
    
        // Rend la vue avec la liste des slots
        return $this->render('back/slot/browse.html.twig', [
            'slotList' => $slotList,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}', name: 'app_back_slot_read', methods: ['GET'])]
    public function read(int $id, SlotRepository $slotRepository): Response
    {
        // Fetch the slot by its ID
        $slot = $slotRepository->find($id);

        // Check if the slot exists
        if (!$slot) {
            throw $this->createNotFoundException('Ce créneau n\'existe pas.');
        }
        return $this->render('back/slot/read.html.twig', [
            'slot' => $slot,
        ]);
    }

    #[Route('/back/slot/add', name: 'app_back_slot_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crée un nouvel objet Slot
        $slot = new Slot();

        // Crée un formulaire pour le Slot
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => true]);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste le Slot dans la base de données
            $entityManager->persist($slot);
            $entityManager->flush();
            // Ajoute un message flash de succès
            $this->addFlash('success', 'Le créneau a bien été créé.');

            // Redirige vers la page de navigation des créneaus
            return $this->redirectToRoute('app_back_slot_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Rend la vue du formulaire d'ajout de Slot
        return $this->render('back/slot/add.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/edit', name: 'app_back_slot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        // Crée un formulaire pour le Slot existant
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => false]);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste les modifications dans la base de données
            $entityManager->flush();

            // Récupère l'ID du Slot modifié
            $editedSlotId = $slot->getId();

            // Ajoute un message flash pour la modification réussie
            $this->addFlash('success', 'Le créneau a bien été modifié.');

            // Redirige vers la page de lecture du Slot modifié
            return $this->redirectToRoute('app_back_slot_read', ['id' => $editedSlotId], Response::HTTP_SEE_OTHER);
        }

        // Rend la vue du formulaire d'édition de Slot
        return $this->render('back/slot/edit.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/delete', name: 'app_back_slot_delete', methods: ['POST'])]
    public function delete(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        // Vérifie si le jeton CSRF est valide
        if ($this->isCsrfTokenValid('delete' . $slot->getId(), $request->request->get('_token'))) {
            // Supprime le Slot de la base de données
            $entityManager->remove($slot);
            $entityManager->flush();

            // Ajoute un message flash de succès
            $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
        } else {
            // Si le jeton CSRF n'est pas valide, ajoute un message flash d'erreur
            $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
        }

        // Redirige vers la page de navigation des créneaus
        return $this->redirectToRoute('app_back_slot_browse');
    }
}