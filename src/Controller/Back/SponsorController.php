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
        // Récupération du terme de recherche depuis la requête
        $search = $request->query->get('search');

        // Utilisation du repository pour obtenir les sponsors correspondant au terme de recherche
        $sponsorList = $sponsorRepository->findByNameSearch($search);

        // Paginer les résultats obtenus
        $sponsorList = $paginator->paginate(
            $sponsorList, // Query builder avec les résultats non paginés
            $request->query->getInt('page', 1), // Numéro de la page actuelle, par défaut 1
            5 // Nombre d'éléments par page
        );

        // Rendu du template avec la liste paginée des sponsors et le terme de recherche
        return $this->render('back/sponsor/browse.html.twig', [
            'sponsorList' => $sponsorList, // Liste paginée des sponsors
            'search' => $search, // Terme de recherche actuel pour remplir le champ de recherche
        ]);
    }
    

    #[Route('/back/sponsor/add', name: 'app_back_sponsor_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crée un nouvel objet Sponsor
        $sponsor = new Sponsor();

        // Crée un formulaire pour le partenaire
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste le partenaire dans la base de données
            $entityManager->persist($sponsor);
            $entityManager->flush();

            // Ajoute un message flash pour la création réussie
            $this->addFlash('success', 'Le partenaire a bien été créé.');

            // Redirige vers la page de navigation des partenaires
            return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Affiche un message flash en cas d'erreur de validation
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Rend le formulaire d'ajout de le partenaire
        return $this->render('back/sponsor/add.html.twig', [
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/back/sponsor/{id<\d+>}/edit', name: 'app_back_sponsor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sponsor $sponsor, EntityManagerInterface $entityManager): Response
    {
        // Crée un formulaire pour le partenaire existant
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste les modifications dans la base de données
            $entityManager->flush();          

            // Ajoute un message flash pour la modification réussie    
            $this->addFlash('success', 'Le partenaire a bien été modifié.');

            // Redirige vers la page de lecture de le partenaire modifié
            return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
        }

        // Affiche un message flash en cas d'erreur de validation
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
        }

        // Rend le formulaire d'édition de le partenaire
        return $this->render('back/sponsor/edit.html.twig', [
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/back/sponsor/{id<\d+>}/delete', name: 'app_back_sponsor_delete', methods: ['POST'])]
    public function delete(Request $request, Sponsor $sponsor, EntityManagerInterface $entityManager): Response
    {
        // Vérifie si le jeton CSRF est valide
        if ($this->isCsrfTokenValid('delete' . $sponsor->getId(), $request->getPayload()->get('_token'))) {
            // Supprime le partenaire de la base de données
            $entityManager->remove($sponsor);
            $entityManager->flush();

            // Ajoute un message flash pour la suppression réussie
            $this->addFlash('success', 'Le partenaire a bien été supprimé.');
        } else {
            // Ajoute un message flash en cas d'échec de la suppression
            $this->addFlash('error', 'La suppression de l\'sponsore a échoué. Le jeton CSRF est invalide.');
        }

        // Redirige vers la page de navigation des partenaires
        return $this->redirectToRoute('app_back_sponsor_browse', [], Response::HTTP_SEE_OTHER);
    }
}
