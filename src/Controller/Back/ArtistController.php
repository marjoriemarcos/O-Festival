<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;
use App\Entity\Slot;
use App\Form\ArtistType;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArtistRepository;
use Knp\Component\Pager\PaginatorInterface;


class ArtistController extends AbstractController
{

    #[Route('/back/artist', name: 'app_back_artist_browse', methods: ['GET'])]
    public function browse(ArtistRepository $artistRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Create QueryBuilder to fetch artists and their genre names
        $queryBuilder = $artistRepository->createQueryBuilder('a')
            ->select('a, g, s')
            ->leftJoin('a.genres', 'g')
            ->leftJoin('a.slot', 's')
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
        return $this->render('back/artist/browse.html.twig', [
            'artistList' => $artistList,
        ]);
    }




    #[Route('/back/artist/{id<\d+>}', name: 'app_back_artist_read', methods: ['GET'])]
    public function read(int $id, ArtistRepository $artistRepository, EntityManagerInterface $entityManager): Response
    {
        // Fetch the artist by its ID
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

    #[Route('/back/artist/add', name: 'app_back_artist_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($artist);
            $entityManager->flush();

            $this->addFlash('success', 'L\'artiste a bien été créé.');
            return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');

        }
		
        return $this->render('back/artist/add.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/back/artist/{id<\d+>}/edit', name: 'app_back_artist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Get the ID of the edited artist
            $editedArtistId = $artist->getId();

            // Add flash message for successful modification    
            $this->addFlash('success', 'L\'artiste a bien été modifié.');

            // Redirect to the read page of the edited artist
            return $this->redirectToRoute('app_back_artist_read', ['id' => $editedArtistId], Response::HTTP_SEE_OTHER);
        }
        
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');

        }

        return $this->render('back/artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/artist/{id<\d+>}/delete', name: 'app_back_artist_delete', methods: ['POST'])]
    public function delete(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $artist->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($artist);
            $entityManager->flush();

            // Add flash message for successful deletion
            $this->addFlash('success', 'L\'artiste a bien été supprimé.');
        } else {
            $this->addFlash('error', 'La suppression de l\'artiste a échoué. Le jeton CSRF est invalide.');
        }

        return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
    }
	
}

