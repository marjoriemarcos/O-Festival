<?php

namespace App\Services;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class SendEmailService
{
    // The mailer interface instance
    private MailerInterface $mailer;

    // Constructor method to inject the MailerInterface dependency
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Sends a contact email using the provided details.     *     * @param string $to      The recipient email address.
     * @param string $from    The sender email address.
     * @param string $subject The subject of the email.
     * @param array  $context The context data to be passed to the email template.
     * @throws TransportExceptionInterface
     */
    public function sendContactEmail(string $to, string $from, string $subject, array $context): void
    {
        $email = (new TemplatedEmail())
            ->to($to)
            ->from($from)
            ->subject($subject)
            ->htmlTemplate('emails/contact.html.twig')
            ->context($context);
        // Send the email
        $this->mailer->send($email);
    }

    /**
     * Sends a confirmation email using the provided details.     *     * @param string $to      The recipient email address.
     * @param string $from    The sender email address.
     * @param string $subject The subject of the email.
     * @param array  $context The context data to be passed to the email template.
     * @throws TransportExceptionInterface
     */
    public function sendConfirmationEmail(string $to, string $from, string $subject, array $context): void
    {
        $email = (new TemplatedEmail())
            ->to($to)
            ->from($from)
            ->subject($subject)
            ->htmlTemplate('emails/contact_confirmation.html.twig')
            ->context($context);
        // Send the email
        $this->mailer->send($email);
    }
}