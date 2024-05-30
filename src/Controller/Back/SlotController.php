<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SlotRepository;
use App\Form\SlotType;
use App\Entity\Slot;

class SlotController extends AbstractController
{
    #[Route('/back/slot', name: 'app_back_slot_browse', methods: ['GET'])]
    public function list(SlotRepository $slotRepository): Response
    {
        // Create QueryBuilder to fetch slots with artist and stage
        $queryBuilder = $slotRepository->createQueryBuilder('s')
            ->select('s', 'artist', 'stage') // Select necessary columns
            ->leftJoin('s.artist', 'artist') // Join artist entity
            ->leftJoin('s.stage', 'stage'); // Join stage entity
    
        // Fetch slots using the QueryBuilder
        $slotList = $queryBuilder->getQuery()->getResult();
    
        return $this->render('back/slot/browse.html.twig', [
            'slotList' => $slotList,
        ]);
    }
    #[Route('/back/slot/{id<\d+>}', name:'app_back_slot_read', methods: ['GET'])]
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
        $slot = new Slot();
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($slot);
            $entityManager->flush();
            $this->addFlash('success', 'Le créneau a bien été créé.');

            return $this->redirectToRoute('app_back_slot_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/slot/add.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/edit', name: 'app_back_slot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SlotType::class, $slot, ['isNew' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Get the ID of the edited slot
            $editedSlotId = $slot->getId();

            // Add flash message for successful modification
            $this->addFlash('success', 'Le créneau a bien été modifié.');

            // Redirect to the read page of the edited slot
            return $this->redirectToRoute('app_back_slot_read', ['id' => $editedSlotId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/slot/edit.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot/{id<\d+>}/delete', name: 'app_back_slot_delete', methods: ['POST'])]
    public function delete(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $slot->getId(), $request->request->get('_token'))) {
            $entityManager->remove($slot);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
        }        
    
        return $this->redirectToRoute('app_back_slot_browse');
    }
    
}
