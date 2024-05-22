<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

class AdminController extends AbstractController
{
    #[Route('/back/admin_list', name: 'adminBrowse')]
    public function adminBrowse(UserRepository $userRepository): Response
    {
        // Fetch users with ROLE_ADMIN
        $admins = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('back/admin/index.html.twig', [
            'admins' => $admins,
        ]);
    }
}
