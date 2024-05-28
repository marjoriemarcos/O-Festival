<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StageRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Stage;
use App\Form\StageType;
use Knp\Component\Pager\PaginatorInterface;

class StageController extends AbstractController
{
    #[Route('/back/stage_list', name: 'app_stage_list_admin', methods: ['GET'])]
    public function list(StageRepository $stageRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Fetch stages with pagination
        $query = $stageRepository->createQueryBuilder('s')
            ->getQuery();

        $stageList = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5 // limit per page
        );
        
        return $this->render('back/stage/list.html.twig', [
            'stageList' => $stageList,
        ]);
    }

    #[Route('/back/stage_list/new', name: 'app_stage_new_admin', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stage);
            $entityManager->flush();
            $this->addFlash('success', 'La scène a bien été créée.');

            return $this->redirectToRoute('app_stage_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/stage/new.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

    #[Route('/back/stage_list/{id<\d+>}/edit', name: 'app_stage_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stage $stage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'La scène a bien été modifiée.');

            return $this->redirectToRoute('app_stage_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/stage/edit.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

    #[Route('/back/stage_list/{id<\d+>}/delete', name: 'app_stage_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Stage $stage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stage->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($stage);
            $entityManager->flush();
            $this->addFlash('success', 'La scène a bien été supprimée.');
        } else {
            $this->addFlash('error', 'La suppression de la scène a échoué. Le jeton CSRF est invalide.');
        }      

        return $this->redirectToRoute('app_stage_list_admin', [], Response::HTTP_SEE_OTHER);
    }
}
