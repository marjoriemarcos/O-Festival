<?php

namespace App\Form;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TicketType extends AbstractType
{
    private EntityManagerInterface $entityManager;
    private TicketRepository $ticketRepo;

    public function __construct (EntityManagerInterface $entityManager, TicketRepository $ticketRepo) {
        $this->entityManager = $entityManager;
        $this->ticketRepo = $ticketRepo;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('type', ChoiceType::class, [
            'choices' => [
                'ticket.form.title1Day' => 'Pass 1 JOUR',
                'ticket.form.title2Day' => 'Pass 2 JOURS',
                'ticket.form.title3Day' => 'Pass 3 JOURS',
            ],
            'label' => 'ticket.form.title',
        ])
        ->add('startAt', DateType::class, [
            'input' => 'datetime_immutable',
            'widget' => 'single_text',
            'label' => 'ticket.form.startAt',
        ])
        ->add('endAt', DateType::class, [
            'input' => 'datetime_immutable',
            'widget' => 'single_text',
            'label' => 'ticket.form.endAt',
        ])
        ->add('duration', ChoiceType::class, [
            'choices' => [
                'ticket.form.duration24' => 24,
                'ticket.form.duration48' => 48,
                'ticket.form.duration72' => 72,
            ],
            'label' => 'ticket.form.duration',
        ])
        ->add('fee', ChoiceType::class, [
            'choices' => [
                'ticket.form.fullFee' => 'Plein Tarif',
                'ticket.form.studentFee' => 'Tarif Étudiant',
                'ticket.form.childFee' => 'Tarif Enfant (-12 ans)',
            ],
            'label' => 'ticket.form.fee',
        ])
        ->add('price', NumberType::class, [
            'label' => 'ticket.form.price',
            'scale' => 2,
            'attr' => [
                'placeholder' => 'ticket.form.pricePlaceholder',
            ],
        ])
        ->add('quantity', IntegerType::class, [
            'label' => 'ticket.form.quantity',
            'attr' => [
                'min' => 0,
                'step' => 1,
            ],
        ]);

        // Ajout des écouteurs sur les deux fonctions lors de l'envoie du formulaire
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'validateData']);
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'getLongTitle']);
    }

    public function validateData (FormEvent $event): void 
    {
        // Récupère les data du formulaire qui vient d'etre envoyé
        $dataFromForm = $event->getForm()->getData();
        // Récupère le repository
        //$ticketRepository = $this->entityManager->getRepository(Ticket::class);
    
        // Rechercher les tickets existants par les paramètres du formulaire
        $existingTickets = $this->ticketRepo->findTicketsByParams(
            $dataFromForm->getType(),
            $dataFromForm->getStartAt(),
            $dataFromForm->getEndAt(),
            $dataFromForm->getFee()
        );
    
        //dump($this->ticketRepo);die;
        // Vérifier si des tickets existent
        if (!empty($existingTickets)) {
            $event->getForm()->addError(new FormError('Il y a déjà un billet avec ce titre, ces dates, et ce tarif.'));
        }
        // Vérifie si la date de début est bien inférieure à la date de fin
        if ($dataFromForm->getStartAt() > $dataFromForm->getEndAt()) {
            $event->getForm()->addError(new FormError('La date début doit être inférieure à la date de fin.'));
        }

    }

    public function getLongTitle (FormEvent $event)
    {
        // Récupère le formulaire envoyé
        $dataFromForm = $event->getForm()->getData();

        // Récupère les données envoyés via le formulaire
        $type = $dataFromForm->getType();
        $startAt = $dataFromForm->getStartAt()->format('d/m/Y');
        $endAt = $dataFromForm->getEndAt()->format('d/m/Y');
        $fee = $dataFromForm->getFee();

        if ($startAt === $endAt) {
            // Met en forme le titre qui sera envoyé en base de données
            $dataFromForm->setTitle(sprintf(
                '%s %s le %s',
                $type,
                $fee,
                $startAt,
            ));

        } else {

            // Met en forme le titre qui sera envoyé en base de données
            $dataFromForm->setTitle(sprintf(
                '%s %s du %s au %s',
                $type,
                $fee,
                $startAt,
                $endAt
            ));

        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
