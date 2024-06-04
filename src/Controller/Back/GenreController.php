<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
Use App\Entity\Genre;
use App\Form\GenreType;
use Knp\Component\Pager\PaginatorInterface;

class GenreController extends AbstractController
{
    #[Route('/back/genre', name: 'app_back_genre_browse', methods: ['GET'])]
    public function browse(GenreRepository $genreRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Get the search term from the request
        $search = $request->query->get('search');

        // Use the repository to get genres matching the search term
        $genreList = $genreRepository->findByNameSearch($search);

        // Paginate the obtained results
        $genreList = $paginator->paginate(
            $genreList, // Query builder with non-paginated results
            $request->query->getInt('page', 1), // Current page number, default is 1
            5 // Number of items per page
        );

        // Render the template with the paginated list of genres and the search term
        return $this->render('back/genre/browse.html.twig', [
            'genreList' => $genreList, // Paginated list of genres
            'search' => $search, // Current search term to fill the search field
        ]);
    }

    #[Route('/back/genre/add', name: 'app_back_genre_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Create a new Genre object
        $genre = new Genre();

        // Create a form for the genre
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the genre to the database
            $entityManager->persist($genre);
            $entityManager->flush();

            // Add a flash message for successful creation
            $this->addFlash('success', 'Le genre a été créé avec succès.');

            // Redirect to the genres browsing page
            return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Render the form to add the genre
        return $this->render('back/genre/add.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre/{id<\d+>}/edit', name: 'app_back_genre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        // Create a form for the existing genre
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the modifications to the database
            $entityManager->flush();

            // Add a flash message for successful modification
            $this->addFlash('success', 'Le genre a été modifié avec succès.');

            // Redirect to the genres browsing page
            return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Render the form to edit the genre
        return $this->render('back/genre/edit.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre/{id<\d+>}/delete', name: 'app_back_genre_delete', methods: ['POST'])]
    public function delete(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete'.$genre->getId(), $request->getPayload()->get('_token'))) {
            // Remove the genre from the database
            $entityManager->remove($genre);
            $entityManager->flush();

            // Add a flash message for successful deletion
            $this->addFlash('success', 'Le genre a été supprimé avec succès.');
        } else {
            // Add a flash message in case of deletion failure
            $this->addFlash('error', 'La suppression du genre a échoué. Le jeton CSRF est invalide.');
        }      

        // Redirect to the genres browsing page
        return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
    }
}
