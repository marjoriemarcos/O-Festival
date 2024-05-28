<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;
use App\Form\ArtistType;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArtistRepository;
use Knp\Component\Pager\PaginatorInterface;


class ArtistController extends AbstractController
{

    #[Route('/back/artist_list', name: 'app_artist_list_admin', methods: ['GET'])]
    public function list(ArtistRepository $artistRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Create QueryBuilder to fetch artists and their genre names
        $queryBuilder = $artistRepository->createQueryBuilder('a')
            ->select('a, g')
            ->leftJoin('a.genres', 'g')
            ->orderBy('a.name', 'ASC');

        // Get the query from QueryBuilder
        $query = $queryBuilder->getQuery();

        // Paginate the query
        $artistList = $paginator->paginate(
        $query,
        $request->query->getInt('page', 1),
        5 // Limit per page
        );

        // Render the template with the paginated list
        return $this->render('back/artist/list.html.twig', [
            'artistList' => $artistList,
        ]);
    }

    


    #[Route('/back/artist_list/{id<\d+>}', name: 'app_artist_read_admin', methods: ['GET'])]
    public function read(int $id, ArtistRepository $artistRepository): Response
    {
        // Fetch the artist by its ID
        $artist = $artistRepository->find($id);

        // Check if the artist exists
        if (!$artist) {
            throw $this->createNotFoundException('The artist does not exist.');
        }

        // Pass the artist to the view
        return $this->render('back/artist/read.html.twig', [
            'artist' => $artist,
        ]);
    }

    #[Route('/back/artist_list/new', name: 'app_artist_new_admin', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($artist);
            $entityManager->flush();
    
            $this->addFlash('success', 'The artist has been created successfully.');
            return $this->redirectToRoute('app_artist_list_admin', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('back/artist/new.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }
    

    #[Route('/back/artist_list/{id<\d+>}/edit', name: 'app_artist_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            $this->addFlash('success', 'The artist has been updated successfully.');
            return $this->redirectToRoute('app_artist_list_admin', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('back/artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/artist_list/{id<\d+>}/delete', name: 'app_artist_delete_admin', methods: ['POST'])]
    public function delete(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artist->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($artist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_artist_list_admin', [], Response::HTTP_SEE_OTHER);
    }
    
}
