<?php

namespace App\Controller\Front;

use App\DTO\ContactDTO;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\TicketRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use IntlDateFormatter;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class InfosController extends AbstractController
{
    // Displays the practical information page
    #[Route('/infos-pratiques', name: 'app_infos_browse')]
    public function browse(
        Request $request,
        MailerInterface $mailer,
        TicketRepository $ticketRepository,
        EntityManagerInterface $entityManager
    ): Response {
        // Retrieve opening and closing dates from the database
        $openingClosingDates = $ticketRepository->findOpeningAndClosingDates();
        $openingDate = new DateTimeImmutable($openingClosingDates['openingDate']);
        $closingDate = new DateTimeImmutable($openingClosingDates['closingDate']);

        // Format dates in French
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $openingFormatted = $formatter->format($openingDate);
        $closingFormatted = $formatter->format($closingDate);

        // Create the contact form
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        // Process form submission
        if ($form->isSubmitted() && $form->isValid()) {
            // Create a new contact entity
            $contact = new Contact();
            $contact->setName($data->name);
            $contact->setEmail($data->email);
            $contact->setContent($data->content);
            $contact->setTreatment('To be processed');

            // Persist contact entity
            $entityManager->persist($contact);
            $entityManager->flush();

            // Send email notification
            $mail = (new TemplatedEmail())
                ->to('ofestival2024@gmail.com')
                ->from($data->email)
                ->subject('Information')
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $data]);
            $mailer->send($mail);

            // Add success flash message
            $this->addFlash('success_contact', 'Votre message a bien été envoyé.');

            // Redirect to the same page after successful submission
            return $this->redirectToRoute('app_infos_browse');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            // Add error flash message if form is submitted but not valid
            $this->addFlash('error_contact', 'Une erreur est survenue. Veuillez vérifier le formulaire de contact.');

        }

        // Render the view with the data
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
            'form'            => $form->createView(),
            'openingDate'     => $openingFormatted,
            'closingDate'     => $closingFormatted,
        ]);
    }

    // Placeholder method for sending requests
    #[Route('/infos-pratiques/send', name: 'app_infos_send_request', methods: 'POST')]
    public function sendRequest(): Response
    {
        // Placeholder method, currently not implemented
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}
