<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Genre;
use App\Entity\Slot;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('picture', UrlType::class, [])
            ->add('video', UrlType::class, [ 'required' => false ])
            ->add('website', UrlType::class, [ 'required' => false ])
            ->add('facebook', UrlType::class, [ 'required' => false ])
            ->add('twitter', UrlType::class, [ 'required' => false ])
            ->add('instagram', UrlType::class, [ 'required' => false ])
            ->add('spotify', UrlType::class, [ 'required' => false ])
            ->add('snapchat', UrlType::class, [ 'required' => false ])
            ->add('tiktok', UrlType::class, [ 'required' => false ])
            ->add('genres', EntityType::class, [                
                'class' => Genre::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,                    
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
