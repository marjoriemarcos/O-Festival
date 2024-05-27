<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\DTO\ContactDTO;
use App\Form\ContactType;
use Mailgun\Mailgun;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class InfosController extends AbstractController
{
    #[Route('/infos-pratiques', name: 'app_infos_browse')]
    public function browse(Request $request, MailerInterface $mailer): Response
    {
        $data = new ContactDTO();
        // crée un formulaire à partir de ContactType et lie les données, traite la requete HTTP
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mail = (new TemplatedEmail())
                ->to('nicolas.joubert@oclock.school')
                ->from($data->email)
                ->subject('Information')
                // définit le modèle de vue pour le corps du message
                ->htmlTemplate('emails/contact.html.twig')
                // définit les variables pour le modèle de vue
                ->context(['data' => $data]);
            $mailer->send($mail);
            $this->addFlash('success', 'Votre message a bien été envoyé');

            return $this->redirectToRoute('app_infos_browse');
        }
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Erreur dans le formulaire, veuillez réessayer');
        }

        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/infos-pratiques', name: 'app_infos_send_request', methods: 'POST')]
    public function sendRequest(): Response
    {
        return $this->render('front/infos/browse.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}
