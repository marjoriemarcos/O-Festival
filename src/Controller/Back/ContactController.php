<?php

namespace App\Controller\Back;

use App\Repository\ContactRepository;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    // Route to browse all contacts
    #[Route('/back/contact', name: 'app_back_contact_browse')]
    public function browse(ContactRepository $contactRepository): Response
    {
        // Get all contacts from the repository
        $contactList = $contactRepository->findAll();

        // Render the template with the contact list
        return $this->render('back/contact/browse.html.twig', [
            'contactList' => $contactList,
        ]);
    }

    // Route to edit a specific contact
    #[Route('/back/contact/{id<\d+>}/edit', name: 'app_back_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        // Get the 'treatment' value from the request
        $treatment = $request->request->get('treatment');

        // Set the 'treatment' value for the contact
        $contact->setTreatment($treatment);

        // Persist the changes to the database
        $entityManager->flush();

        // Redirect to the contact browsing page
        return $this->redirectToRoute('app_back_contact_browse');
    }
}
