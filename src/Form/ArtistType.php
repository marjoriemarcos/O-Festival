<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Genre;
use App\Entity\Slot;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('picture')
            ->add('video')
            ->add('website')
            ->add('facebook')
            ->add('twitter')
            ->add('instagram')
            ->add('spotify')
            ->add('snapchat')
            ->add('tiktok')
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name', // Use 'title' for genre display
                'multiple' => true,
            ])
            ->add('slot', EntityType::class, [
                'class' => Slot::class,
                'choice_label' => function (Slot $slot) {
                    return $slot->getDate()->format('d/m/Y') . ' ' . $slot->getHour();
                }, // Use a combination of 'date' and 'hour' for slot display
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
