<?php

namespace App\Controller\Front;

use App\DTO\ContactDTO;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\TicketRepository;
use App\Services\SendEmailService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;


class InfosController extends AbstractController
{
    // Constructor method to inject the SendEmailService dependency
    private SendEmailService $sendEmailService;
    private string $email;

    public function __construct(SendEmailService $sendEmailService, string $email)
    {
        $this->sendEmailService = $sendEmailService;
        $this->email = $email;
    }

    /**
     * Displays practical information including opening and closing dates, and handles the contact form submission.
     * *     * @param Request $request The HTTP request object.
     * @param MailerInterface        $mailer           The mailer interface to send emails.
     * @param TicketRepository       $ticketRepository The repository to fetch ticket-related data.
     * @param EntityManagerInterface $entityManager    The entity manager to handle database operations.
     *                                                 * @return Response The HTTP response object containing the
     *                                                 rendered view.
     *                                                 * @throws TransportExceptionInterface If there is an issue
     *                                                 sending the email.
     *                                                 * @Route('/infos-pratiques', name='app_infos_browse')
     */
    #[Route('/infos-pratiques', name: 'app_infos_browse')]
    public function browse(Request $request, TicketRepository $ticketRepository, EntityManagerInterface $entityManager): Response
    {
        // Get the opening and closing dates from the database
        $openingClosingDates = $ticketRepository->findOpeningAndClosingDates();
        $openingDate = new DateTimeImmutable($openingClosingDates['openingDate']);
        $closingDate = new DateTimeImmutable($openingClosingDates['closingDate']);

        // Format the dates in French style
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $openingFormatted = $formatter->format($openingDate);
        $closingFormatted = $formatter->format($closingDate);

        // Create the contact form
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Create a new Contact entity and set its properties
            $contact = new Contact();
            $contact->setName($data->name);
            $contact->setEmail($data->email);
            $contact->setContent($data->content);
            $contact->setTreatment('A traiter');

            // Persist the contact entity to the database
            $entityManager->persist($contact);
            $entityManager->flush();

            // Send the contact email using the SendEmailService
            $this->sendEmailService->sendContactEmail(
                $this->email,
                $data->email,
                'Information',
                ['data' => $data]
            );

            $this->addFlash('success_contact', 'Votre message a bien été envoyé');

            // Send a confirmation email to the user
            $this->sendEmailService->sendConfirmationEmail(
                $data->email,
                $this->email,
                'Confirmation de réception de votre message',
                ['data' => $data]);
            return $this->redirectToRoute('app_infos_browse');

        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error_contact', 'Merci de vérifier le formulaire de contact');
        }


        // Render the view with the contact form and the formatted dates
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
            'form'            => $form->createView(),
            'openingDate'     => $openingFormatted,
            'closingDate'     => $closingFormatted,
        ]);
    }

    #[Route('/infos-pratiques/send', name: 'app_infos_send_request', methods: 'POST')]
    public function sendRequest(): Response
    {
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}