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
        // Get the search term from the request
        $search = $request->query->get('search');

        // Use the repository to get users matching the search term
        $userList = $userRepository->findByLastNameSearch($search);

        // Paginate the obtained results
        $userList = $paginator->paginate(
            $userList, // Query builder with non-paginated results
            $request->query->getInt('page', 1), // Current page number, default is 1
            5 // Number of items per page
        );

        // Render the template with the paginated list of users and the search term
        return $this->render('back/user/browse.html.twig', [
            'userList' => $userList, // Paginated list of users
            'search' => $search, // Current search term to populate the search field
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
                // Hash the password     
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
