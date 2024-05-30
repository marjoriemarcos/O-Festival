<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    #[Route('/back/user', name: 'app_back_user_browse')]
    public function browse(UserRepository $userRepository): Response
    {
        // Fetch users with ROLE_ADMIN
        $adminList = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('back/user/browse.html.twig', [
            'adminList' => $adminList,
        ]);}

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
