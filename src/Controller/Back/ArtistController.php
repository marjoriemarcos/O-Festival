<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;
use App\Entity\Slot;
use App\Form\ArtistType;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtistRepository;
use Knp\Component\Pager\PaginatorInterface;

class ArtistController extends AbstractController
{
    // Route to browse artists with pagination and search functionality
    #[Route('/back/artist', name: 'app_back_artist_browse', methods: ['GET'])]
    public function browse(ArtistRepository $artistRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Get the search term from the request
        $search = $request->query->get('search');

        // Use the repository to get artists matching the search term
        $artistList = $artistRepository->findByNameSearch($search);

        // Paginate the results
        $artistList = $paginator->paginate(
            $artistList, // Query builder with unpaginated results
            $request->query->getInt('page', 1), // Current page number, default 1
            5 // Number of items per page
        );

        // Render the template with the paginated artist list and the search term
        return $this->render('back/artist/browse.html.twig', [
            'artistList' => $artistList, // Paginated artist list
            'search' => $search, // Current search term to fill the search field
        ]);
    }

    // Route to read a specific artist's details
    #[Route('/back/artist/{id<\d+>}', name: 'app_back_artist_read', methods: ['GET'])]
    public function read(int $id, ArtistRepository $artistRepository, EntityManagerInterface $entityManager): Response
    {
        // Get the artist by its ID
        $artist = $artistRepository->find($id);

        // Check if the artist exists
        if (!$artist) {
            throw $this->createNotFoundException('Cet artiste n\'existe pas.');
        }

        // Check if the artist is associated with a slot
        $slotRepository = $entityManager->getRepository(Slot::class);
        $slot = $slotRepository->findOneBy(['artist' => $artist]);

        // Pass the artist to the view
        return $this->render('back/artist/read.html.twig', [
            'artist' => $artist,
            'slot' => $slot,
        ]);
    }

    // Route to add a new artist
    #[Route('/back/artist/add', name: 'app_back_artist_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Create a new Artist object
        $artist = new Artist();

        // Create a form for the artist
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the artist to the database
            $entityManager->persist($artist);
            $entityManager->flush();

            // Add a flash message for successful creation
            $this->addFlash('success', 'L\'artiste a été créé avec succès.');

            // Redirect to the artist browsing page
            return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Add a flash message in case of validation errors
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Render the add artist form
        return $this->render('back/artist/add.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    // Route to edit an existing artist
    #[Route('/back/artist/{id<\d+>}/edit', name: 'app_back_artist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        // Create a form for the existing artist
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the changes to the database
            $entityManager->flush();

            // Get the ID of the edited artist
            $editedArtistId = $artist->getId();

            // Add a flash message for successful modification
            $this->addFlash('success', 'L\'artiste a été modifié avec succès.');

            // Redirect to the artist reading page
            return $this->redirectToRoute('app_back_artist_read', ['id' => $editedArtistId], Response::HTTP_SEE_OTHER);
        }

        // Add a flash message in case of validation errors
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Render the edit artist form
        return $this->render('back/artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    // Route to delete an artist
    #[Route('/back/artist/{id<\d+>}/delete', name: 'app_back_artist_delete', methods: ['POST'])]
    public function delete(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $artist->getId(), $request->request->get('_token'))) {
            // Remove the artist from the database
            $entityManager->remove($artist);
            $entityManager->flush();

            // Add a flash message for successful deletion
            $this->addFlash('success', 'L\'artiste a été supprimé avec succès.');
        } else {
            // Add a flash message in case of deletion failure
            $this->addFlash('error', 'Erreur lors de la suppression de l\'artiste. Le jeton CSRF est invalide..');
        }

        // Redirect to the artist browsing page
        return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
    }
}
