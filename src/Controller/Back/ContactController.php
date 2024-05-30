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
    #[Route('/back/contact', name: 'app_back_contact_browse')]
    public function browse(ContactRepository $contactRepository): Response
    {
        $contactList = $contactRepository->findAll();

        return $this->render('back/contact/browse.html.twig', [
            'contactList' => $contactList,
        ]);
    }

    #[Route('/back/contact/{id<\d+>}/edit', name: 'app_back_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        $treatment = $request->request->get('treatment');
        $contact->setTreatment($treatment);
        $entityManager->flush();

        return $this->redirectToRoute('app_back_contact_browse');

    }

}
