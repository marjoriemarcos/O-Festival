<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Sponsor;
use App\Form\SponsorType;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SponsorRepository;
use Knp\Component\Pager\PaginatorInterface;


class SponsorController extends AbstractController
{
    #[Route('/back/sponsor', name: 'app_back_sponsor_browse', methods: ['GET'])]
    public function browse(SponsorRepository $sponsorRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Retrieve the search term from the request
        $search = $request->query->get('search');

        // Use the repository to get sponsors matching the search term
        $sponsorList = $sponsorRepository->findByNameSearch($search);

        // Paginate the retrieved results
        $sponsorList = $paginator->paginate(
            $sponsorList, // Query builder with non-paginated results
            $request->query->getInt('page', 1), // Current page number, default 1
            5 // Number of items per page
        );

        // Render the template with the paginated list of sponsors and the search term
        return $this->render('back/sponsor/browse.html.twig', [
            'sponsorList' => $sponsorList, // Paginated list of sponsors
            'search' => $search, // Current search term to fill the search field
        ]);
    }
    

    #[Route('/back/sponsor/add', name: 'app_back_sponsor_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Create a new Sponsor object
        $sponsor = new Sponsor();

        // Create a form for the sponsor
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the sponsor to the database
            $entityManager->persist($sponsor);
            $entityManager->flush();

            // Add a flash message for successful creation
            $this->addFlash('success', 'Le partenaire a bien été créé.');

            // Redirect to the sponsors browsing page
            return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Add a flash message in case of validation error
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Render the sponsor add form
        return $this->render('back/sponsor/add.html.twig', [
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/back/sponsor/{id<\d+>}/edit', name: 'app_back_sponsor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sponsor $sponsor, EntityManagerInterface $entityManager): Response
    {
        // Create a form for the existing sponsor
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the modifications to the database
            $entityManager->flush();          

            // Add a flash message for successful modification
            $this->addFlash('success', 'Le partenaire a bien été modifié.');

            // Redirect to the page to read the modified sponsor
            return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Add a flash message in case of validation error
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Render the sponsor edit form
        return $this->render('back/sponsor/edit.html.twig', [
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/sponsor/{id<\d+>}/delete', name: 'app_back_sponsor_delete', methods: ['POST'])]
    public function delete(Request $request, Sponsor $sponsor, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $sponsor->getId(), $request->getPayload()->get('_token'))) {
            // Remove the sponsor from the database
            $entityManager->remove($sponsor);
            $entityManager->flush();

            // Add a flash message for successful deletion
            $this->addFlash('success', 'Le partenaire a bien été supprimé.');
        } else {
            // Add a flash message in case of deletion failure due to invalid CSRF token
            $this->addFlash('error', 'La suppression du partenaire a échoué. Le jeton CSRF est invalide.');
        }

        // Redirect to the sponsors browsing page
        return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
    }
}
