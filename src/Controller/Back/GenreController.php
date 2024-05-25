<?php

namespace App\Controller\Back;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
Use App\Entity\Genre;
use App\Form\GenreType;

class GenreController extends AbstractController
{
    #[Route('/back/genre_list', name: 'app_genre_list_admin', methods: ['GET'])]
    public function list(GenreRepository $genreRepository): Response
    {
        // Fetch genres
        $genreList = $genreRepository->findAll();
        return $this->render('back/genre/list.html.twig', [
            'genreList' => $genreList,
        ]);
    }

    #[Route('/back/genre_list/new', name: 'app_genre_new_admin', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($genre);
            $entityManager->flush();

            return $this->redirectToRoute('app_genre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/genre/new.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre_list/{id<\d+>}/edit', name: 'app_genre_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_genre_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/genre/edit.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/back/genre_list/{id<\d+>}/delete', name: 'app_genre_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$genre->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($genre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_genre_list_admin', [], Response::HTTP_SEE_OTHER);
    }
   
}
