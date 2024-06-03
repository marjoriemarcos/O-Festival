<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{

    #[Route('/back/user', name: 'app_back_user_browse')]
    public function browse(UserRepository $userRepository, Request $request, PaginatorInterface $paginator): Response
    {
        // Récupération du terme de recherche depuis la requête
        $search = $request->query->get('search');

        // Utilisation du repository pour obtenir les utilisateurs correspondant au terme de recherche
        $userList = $userRepository->findByLastNameSearch($search);

        // Paginer les résultats obtenus
        $userList = $paginator->paginate(
            $userList, // Query builder avec les résultats non paginés
            $request->query->getInt('page', 1), // Numéro de la page actuelle, par défaut 1
            5 // Nombre d'éléments par page
        );

        // Rendu du template avec la liste paginée des utilisateurs et le terme de recherche
        return $this->render('back/user/browse.html.twig', [
            'userList' => $userList, // Liste paginée des utilisateurs
            'search' => $search, // Terme de recherche actuel pour remplir le champ de recherche
        ]);
    }

        #[Route('/back/user/add', name: 'app_back_user_add', methods: ['GET', 'POST'])]
        public function add(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
        {
            $user = new User();
            // add a option in a form
            $form = $this->createForm(UserType::class, $user, ['is_add' => true]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Hash du password     
                $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));

                $entityManager->persist($user);
                $entityManager->flush();
    
                $this->addFlash('success', 'L\'administrateur a bien été créé.');
                return $this->redirectToRoute('app_back_user_browse', [], Response::HTTP_SEE_OTHER);
            }

            if ($form->isSubmitted() && !$form->isValid()) {
                $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
    
            }
            return $this->render('back/user/add.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
            ]);
        }

        #[Route('/back/user/{id<\d+>}/edit', name: 'app_back_user_edit', methods: ['GET', 'POST'])]
        public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();
       
                // Add flash message for successful modification    
                $this->addFlash('success', 'L\'administrateur a bien été modifié.');
    
                // Redirect to the read page of the edited artist
                return $this->redirectToRoute('app_back_user_browse', [], Response::HTTP_SEE_OTHER);
            }
            
            if ($form->isSubmitted() && !$form->isValid()) {
                $this->addFlash('error', 'Erreur de validation : veuillez corriger les erreurs dans le formulaire.');
    
            }
    
            return $this->render('back/user/edit.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
            ]);
        }

        #[Route('/back/user/{id<\d+>}/delete', name: 'app_back_user_delete', methods: ['POST'])]
        public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
                $entityManager->remove($user);
                $entityManager->flush();
        
                $this->addFlash('success', 'L\'administrateur a été supprimé avec succès.');
            } else {
                $this->addFlash('error', 'La suppression de l\'administrateur a échoué. Le jeton CSRF est invalide.');
            }        
        
            return $this->redirectToRoute('app_back_user_browse');
        }


}
