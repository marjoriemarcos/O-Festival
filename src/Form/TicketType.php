<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('startAt', null, [
                'widget' => 'single_text',
            ])
            ->add('endAt', null, [
                'widget' => 'single_text',
            ])
            ->add('quantity')
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
