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
        // Récupère tous les artistes triés par nom
        $artistList = $artistRepository->findBy([], ['name' => 'ASC']);

        // Paginer la requête
        $artistList = $paginator->paginate(
            $artistList,
            $request->query->getInt('page', 1), // Utilisez la requête au lieu de artistList
            5 // Limite par page
        );

        // Rendre le template avec la liste paginée des artistes
        return $this->render('back/artist/browse.html.twig', [
            'artistList' => $artistList,
        ]);
    }

    #[Route('/back/artist/{id<\d+>}', name: 'app_back_artist_read', methods: ['GET'])]
    public function read(int $id, ArtistRepository $artistRepository, EntityManagerInterface $entityManager): Response
    {
        // Récupère l'artiste par son ID
        $artist = $artistRepository->find($id);

        // Vérifie si l'artiste existe
        if (!$artist) {
            throw $this->createNotFoundException('Cet artiste n\'existe pas.');
        }

        // Vérifie si l'artiste est associé à un créneau
        $slotRepository = $entityManager->getRepository(Slot::class);
        $slot = $slotRepository->findOneBy(['artist' => $artist]);

        // Passe l'artiste à la vue
        return $this->render('back/artist/read.html.twig', [
            'artist' => $artist,
            'slot' => $slot,
        ]);
    }

    #[Route('/back/artist/add', name: 'app_back_artist_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crée un nouvel objet Artist
        $artist = new Artist();

        // Crée un formulaire pour l'artiste
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste l'artiste dans la base de données
            $entityManager->persist($artist);
            $entityManager->flush();

            // Ajoute un message flash pour la création réussie
            $this->addFlash('success', 'L\'artiste a bien été créé.');

            // Redirige vers la page de navigation des artistes
            return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Affiche un message flash en cas d'erreur de validation
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Rend le formulaire d'ajout de l'artiste
        return $this->render('back/artist/add.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/back/artist/{id<\d+>}/edit', name: 'app_back_artist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        // Crée un formulaire pour l'artiste existant
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste les modifications dans la base de données
            $entityManager->flush();

            // Récupère l'ID de l'artiste modifié
            $editedArtistId = $artist->getId();

            // Ajoute un message flash pour la modification réussie    
            $this->addFlash('success', 'L\'artiste a bien été modifié.');

            // Redirige vers la page de lecture de l'artiste modifié
            return $this->redirectToRoute('app_back_artist_read', ['id' => $editedArtistId], Response::HTTP_SEE_OTHER);
        }

        // Affiche un message flash en cas d'erreur de validation
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Rend le formulaire d'édition de l'artiste
        return $this->render('back/artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/artist/{id<\d+>}/delete', name: 'app_back_artist_delete', methods: ['POST'])]
    public function delete(Request $request, Artist $artist, EntityManagerInterface $entityManager): Response
    {
        // Vérifie si le jeton CSRF est valide
        if ($this->isCsrfTokenValid('delete' . $artist->getId(), $request->getPayload()->get('_token'))) {
            // Supprime l'artiste de la base de données
            $entityManager->remove($artist);
            $entityManager->flush();

            // Ajoute un message flash pour la suppression réussie
            $this->addFlash('success', 'L\'artiste a bien été supprimé.');
        } else {
            // Ajoute un message flash en cas d'échec de la suppression
            $this->addFlash('error', 'La suppression de l\'artiste a échoué. Le jeton CSRF est invalide.');
        }

        // Redirige vers la page de navigation des artistes
        return $this->redirectToRoute('app_back_artist_browse', [], Response::HTTP_SEE_OTHER);
    }
}
