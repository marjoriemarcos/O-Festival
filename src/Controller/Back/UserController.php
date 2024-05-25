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
    #[Route('/back/user_list', name: 'app_user_list_admin')]
    public function list(UserRepository $userRepository): Response
    {
        // Fetch users with ROLE_ADMIN
        $adminList = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('back/user/list.html.twig', [
            'adminList' => $adminList,
        ]);}

        #[Route('/back/user_list/{id<\d+>}/delete', name: 'app_user_delete_admin', methods: ['POST'])]
        public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            var_dump($request->request->all());
            if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
                $entityManager->remove($user);
                $entityManager->flush();
        
                $this->addFlash('success', 'Le créneau a été supprimé avec succès.');
            } else {
                $this->addFlash('error', 'La suppression du créneau a échoué. Le jeton CSRF est invalide.');
            }        
        
            return $this->redirectToRoute('app_user_list_admin');
        }
}
