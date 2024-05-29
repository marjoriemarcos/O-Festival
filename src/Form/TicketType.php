<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ])
            ->add('price')
            ->add('startAt', DateType::class, [
                'input' => 'datetime_immutable',    
                "attr" => [
                    "placeholder" => "Ex : Pass 1 JOUR"
                ]            
            ])
            ->add('endAt', DateType::class, [
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
                    'Plein Tarif' => 'Plein Tarif',
                    'Tarif Etudiant' => 'Tarif Etudiant',
                    'Tarif Enfant (-12 ans)' => 'Tarif Enfant (-12 ans)',
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
