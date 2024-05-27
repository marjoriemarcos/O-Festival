<?php

namespace App\Controller\Back;

use App\Repository\ContactRepository;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/back/contact_list', name: 'app_contact_list_admin')]
    public function list(ContactRepository $contactRepository): Response
    {
        $contactList = $contactRepository->findAll();

        return $this->render('back/contact/list.html.twig', [
            'contactList' => $contactList,
        ]);
    }

    #[Route('/back/contact_list/{id<\d+>}/edit', name: 'app_contact_edit_admin', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        $treatment = $request->request->get('treatment');
        $contact->setTreatment($treatment);
        $entityManager->flush();

        return $this->redirectToRoute('app_contact_list_admin');

    }

}
