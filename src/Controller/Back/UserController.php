<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('/back/user_list', name: 'userBrowse')]
    public function userBrowse(UserRepository $userRepository): Response
    {
        // Fetch users with ROLE_ADMIN
        $adminList = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('back/user/index.html.twig', [
            'adminList' => $adminList,
        ]);}
}
