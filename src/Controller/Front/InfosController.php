<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\DTO\ContactDTO;
use App\Form\ContactType;
use App\Repository\TicketRepository;
use DateTimeImmutable;
use IntlDateFormatter;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class InfosController extends AbstractController
{
    #[Route('/infos-pratiques', name: 'app_infos_browse')]
    public function browse(Request $request, MailerInterface $mailer,TicketRepository $ticketRepository,
                           EntityManagerInterface $entityManager): Response
    {
        // Récupérer les dates d'ouverture et de fermeture depuis la base de données
        $openingClosingDates = $ticketRepository->findOpeningAndClosingDates();
        $openingDate = new DateTimeImmutable($openingClosingDates['openingDate']);
        $closingDate = new DateTimeImmutable($openingClosingDates['closingDate']);
    
        // Formater les dates en français
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $openingFormatted = $formatter->format($openingDate);
        $closingFormatted = $formatter->format($closingDate);
    
        // Créer le formulaire de contact
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {

            $contact = new Contact();
            $contact->setName($data->name);
            $contact->setEmail($data->email);
            $contact->setContent($data->content);
            $contact->setTreatment('A traiter');

            $entityManager->persist($contact);
            $entityManager->flush();

            $mail = (new TemplatedEmail())
                ->to('ofestival@gmail.com')
                ->from($data->email)
                ->subject('Information')
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $data]);
            $mailer->send($mail);
            $this->addFlash('success', 'Votre message a bien été envoyé');
    
            return $this->redirectToRoute('app_infos_browse');
        }
    
        // Rendre la vue avec les données
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
            'form' => $form->createView(),
            'openingDate' => $openingFormatted,
            'closingDate' => $closingFormatted,
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
