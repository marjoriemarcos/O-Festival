<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('startAt', DateTimeType::class, [
                'input' => 'datetime_immutable',                
            ])
            ->add('endAt', DateTimeType::class, [
                'input' => 'datetime_immutable',
            ])
            ->add('quantity', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'step' => 1,
                ],
            ])
            ->add('fee', ChoiceType::class, [
                'choices' => [
                    'Normal' => 'Normal',
                    'Etudiant' => 'Etudiant',
                    'Enfant (-12 ans)' => 'Enfant (-12 ans)',
                ],
            ])
            ->add('duration', ChoiceType::class, [
                'choices' => [
                    '24 heures' => 24,
                    '48 heures' => 48,
                    '72 heures' => 72,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
