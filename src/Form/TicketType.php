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
    private TicketRepository $ticketRepo;

    public function __construct ( TicketRepository $ticketRepo) {
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

        // Add event listener on sent form
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'validateData']);
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'getLongTitle']);
    }

    public function validateData (FormEvent $event): void 
    {
        // Retrieve the form data
        $form = $event->getForm();
        $dataFromForm = $event->getForm()->getData();

        // Check if it's an add form
        if ($form->getConfig()->getOption('isNew') === true) {
                
            // Query the database to check if the form data already exists
            $existingTickets = $this->ticketRepo->findTicketsByParams(
                $dataFromForm->getType(),
                $dataFromForm->getStartAt(),
                $dataFromForm->getEndAt(),
                $dataFromForm->getFee(),
                null
            );
           
            // If the variable is not empty, it means there is already a ticket with these details
            if (!empty($existingTickets)) {
                    $event->getForm()->addError(new FormError('Il y a déjà un billet avec ce titre, ces dates, et ce tarif.'));
            }

        }

        // Check if it's an edit form
        if ($form->getConfig()->getOption('isNew') === false) {
           
            // Query the database without considering the current ticket's ID
            $existingTickets = $this->ticketRepo->findTicketsByParams(
                $dataFromForm->getType(),
                $dataFromForm->getStartAt(),
                $dataFromForm->getEndAt(),
                $dataFromForm->getFee(),
                $dataFromForm->getId()
            );

          // If the variable is not empty, it means there is already a ticket with these details
          if (!empty($existingTickets)) {
            $event->getForm()->addError(new FormError('Il y a déjà un billet avec ce titre, ces dates, et ce tarif.'));
            }
            
        }
        // Validate the duration for "Pass 1 JOUR"
        if ($dataFromForm->getStartAt() > $dataFromForm->getEndAt()) {
            $event->getForm()->addError(new FormError('La date début doit être inférieure à la date de fin.'));
        }

        // Validate the duration for "Pass 1 JOUR"
        if ($dataFromForm->getType() === 'Pass 1 JOUR') {
            if ($dataFromForm->getDuration() != 24 || $dataFromForm->getStartAt() != $dataFromForm->getEndAt() ) {
                $event->getForm()->addError(new FormError('Il y a une erreur dans la durée, veuillez à selectionner 24h ou les bonnes dates pour un Pass 1 JOUR'));
            }
        }
        // Validate the duration for "Pass 2 JOURS"
        if ($dataFromForm->getType() === 'Pass 2 JOURS') {
            if ($dataFromForm->getDuration() != 48 || $dataFromForm->getStartAt()->modify('+1 day') != $dataFromForm->getEndAt()) {
                $event->getForm()->addError(new FormError('Il y a une erreur dans la durée, veuillez à selectionner 48h ou les bonnes dates pour un Pass 2 JOURS'));
            }
        }
        // Validate the duration for "Pass 3 JOURS"
        if ($dataFromForm->getType() === 'Pass 3 JOURS') {
            if ($dataFromForm->getDuration() != 72 || $dataFromForm->getStartAt()->modify('+2 day') != $dataFromForm->getEndAt()) {
                $event->getForm()->addError(new FormError('Il y a une erreur dans la durée, veuillez à selectionner 72h ou les bonnes dates pour un Pass 3 JOURS'));
            }
        }

        
    }

 
    public function getLongTitle (FormEvent $event)
    {
        // Retrieve the form data
        $dataFromForm = $event->getForm()->getData();

        // Extract form data
        $type = $dataFromForm->getType();
        $startAt = $dataFromForm->getStartAt()->format('d/m/Y');
        $endAt = $dataFromForm->getEndAt()->format('d/m/Y');
        $fee = $dataFromForm->getFee();

        if ($startAt === $endAt) {
            // Format the title to be saved in the database
            $dataFromForm->setTitle(sprintf(
                '%s %s le %s',
                $type,
                $fee,
                $startAt,
            ));

        } else {

            // Format the title to be saved in the database
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
            'isNew' => true, // By default, it's the "new" form
        ]);
    }
}
