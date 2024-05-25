<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Slot;
use App\Entity\Stage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('hour')
            ->add('day', ChoiceType::class, [
                'choices' => [
                    'Jour 1' => 'J1',
                    'Jour 2' => 'J2',
                    'Jour 3' => 'J3',
                ],
            ])
            ->add('artist', EntityType::class, [
                'class' => Artist::class,
                'choice_label' => 'name',
            ])
            ->add('stage', EntityType::class, [
                'class' => Stage::class,
                'choice_label' => 'name', 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Slot::class,
        ]);
    }
}
