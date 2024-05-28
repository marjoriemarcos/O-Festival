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
    #[Route('/back/slot_list', name: 'app_slot_list_admin', methods: ['GET'])]
    public function list(SlotRepository $slotRepository): Response
    {
        // Create QueryBuilder to fetch slots with artist and stage
        $queryBuilder = $slotRepository->createQueryBuilder('s')
            ->select('s', 'artist', 'stage') // Select necessary columns
            ->leftJoin('s.artist', 'artist') // Join artist entity
            ->leftJoin('s.stage', 'stage'); // Join stage entity
    
        // Fetch slots using the QueryBuilder
        $slotList = $queryBuilder->getQuery()->getResult();
    
        return $this->render('back/slot/list.html.twig', [
            'slotList' => $slotList,
        ]);
    }
    #[Route('/back/slot_list/{id<\d+>}', name:'app_slot_read_admin', methods: ['GET'])]
    public function read(int $id, SlotRepository $slotRepository): Response
    {
        // Fetch the slot by its ID
        $slot = $slotRepository->find($id);

        // Check if the slot exists
        if (!$slot) {
            throw $this->createNotFoundException('The slot does not exist.');
        }

        return $this->render('back/slot/read.html.twig', [
            'slot' => $slot,
        ]);
    }

    #[Route('/back/slot_list/new', name: 'app_slot_new_admin', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $slot = new Slot();
        $form = $this->createForm(SlotType::class, $slot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($slot);
            $entityManager->flush();

            return $this->redirectToRoute('app_slot_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/slot/new.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot_list/{id<\d+>}/edit', name: 'app_slot_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SlotType::class, $slot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_slot_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/slot/edit.html.twig', [
            'slot' => $slot,
            'form' => $form,
        ]);
    }

    #[Route('/back/slot_list/{id<\d+>}/delete', name: 'app_slot_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Slot $slot, EntityManagerInterface $entityManager): Response
    {
        var_dump($request->request->all());
        if ($this->isCsrfTokenValid('delete' . $slot->getId(), $request->request->get('_token'))) {
            $entityManager->remove($slot);
            $entityManager->flush();
    
            $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
        }        
    
        return $this->redirectToRoute('app_slot_list_admin');
    }
    
}
