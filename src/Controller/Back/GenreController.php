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
        // Récupération du terme de recherche depuis la requête
        $search = $request->query->get('search');

        // Utilisation du repository pour obtenir les genres correspondant au terme de recherche
        $genreList = $genreRepository->findByNameSearch($search);

        // Paginer les résultats obtenus
        $genreList = $paginator->paginate(
            $genreList, // Query builder avec les résultats non paginés
            $request->query->getInt('page', 1), // Numéro de la page actuelle, par défaut 1
            5 // Nombre d'éléments par page
        );

        // Rendu du template avec la liste paginée des genres et le terme de recherche
        return $this->render('back/genre/browse.html.twig', [
            'genreList' => $genreList, // Liste paginée des genres
            'search' => $search, // Terme de recherche actuel pour remplir le champ de recherche
        ]);
    }

    #[Route('/back/genre/add', name: 'app_back_genre_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($genre);
            $entityManager->flush();

            $this->addFlash('success', 'Le genre a bien été créé.');            
            return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/genre/add.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre/{id<\d+>}/edit', name: 'app_back_genre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Le genre a bien été modifié.');   
            return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/genre/edit.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre/{id<\d+>}/delete', name: 'app_back_genre_delete', methods: ['POST'])]
    public function delete(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$genre->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($genre);
            $entityManager->flush();
            $this->addFlash('success', 'Le genre a bien été supprimé.');   
        } else {
            $this->addFlash('error', 'La suppression du genre a échoué. Le jeton CSRF est invalide.');
        }      

        return $this->redirectToRoute('app_back_genre_browse', [], Response::HTTP_SEE_OTHER);
    }
}