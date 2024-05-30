<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', ChoiceType::class, [
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
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
