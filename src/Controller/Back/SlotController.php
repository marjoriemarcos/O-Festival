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
        // Retrieve all slots sorted by date and time with preloaded relationships
        $slotList = $slotRepository->findAllSorted();
    
        // Render the view with the list of slots
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
        // Create a new Slot object
        $slot = new Slot();

        // Create a form for the Slot
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => true]);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the Slot to the database
            $entityManager->persist($slot);
            $entityManager->flush();
            // Add a success flash message
            $this->addFlash('success', 'Le créneau a bien été créé.');

            // Redirect to the slots browsing page
            return $this->redirectToRoute('app_back_slot_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Render the view of the Slot add form
        return $this->render('back/slot/add.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/edit', name: 'app_back_slot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        // Create a form for the existing Slot
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => false]);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the modifications to the database
            $entityManager->flush();

            // Get the ID of the modified Slot
            $editedSlotId = $slot->getId();

            // Add a success flash message for successful modification
            $this->addFlash('success', 'Le créneau a bien été modifié.');

            // Redirect to the page to read the modified Slot
            return $this->redirectToRoute('app_back_slot_read', ['id' => $editedSlotId], Response::HTTP_SEE_OTHER);
        }

        // Render the view of the Slot edit form
        return $this->render('back/slot/edit.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/delete', name: 'app_back_slot_delete', methods: ['POST'])]
    public function delete(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $slot->getId(), $request->request->get('_token'))) {
            // Remove the Slot from the database
            $entityManager->remove($slot);
            $entityManager->flush();

            // Add a success flash message
            $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
        } else {
            // If CSRF token is not valid, add an error flash message
            $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
        }

        // Redirect to the slots browsing page
        return $this->redirectToRoute('app_back_slot_browse');
    }
}
