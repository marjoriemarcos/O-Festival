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
                'Pass 1 JOUR' => 'Pass 1 JOUR',
                'Pass 2 JOURS' => 'Pass 2 JOURS',
                'Pass 3 JOURS' => 'Pass 3 JOURS',
            ],
            'label' => 'Type de Pass',
        ])
        ->add('startAt', DateType::class, [
            'input' => 'datetime_immutable',
            'widget' => 'single_text',
            'label' => 'Date de début',
            'attr' => [
                'placeholder' => 'Ex : Pass 1 JOUR',
            ],
        ])
        ->add('endAt', DateType::class, [
            'input' => 'datetime_immutable',
            'widget' => 'single_text',
            'label' => 'Date de fin',
        ])
        ->add('duration', ChoiceType::class, [
            'choices' => [
                '24 heures' => 24,
                '48 heures' => 48,
                '72 heures' => 72,
            ],
            'label' => 'Durée',
        ])
        ->add('fee', ChoiceType::class, [
            'choices' => [
                'Plein Tarif' => 'Plein Tarif',
                'Tarif Étudiant' => 'Tarif Étudiant',
                'Tarif Enfant (-12 ans)' => 'Tarif Enfant (-12 ans)',
            ],
            'label' => 'Tarif',
        ])
        ->add('price', NumberType::class, [
            'label' => 'Prix (€)',
            'scale' => 2,
            'attr' => [
                'placeholder' => 'Ex : 20.00',
            ],
        ])
        ->add('quantity', IntegerType::class, [
            'label' => 'Quantité',
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
