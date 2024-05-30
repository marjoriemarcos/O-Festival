<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom',
            ])
            ->add('description', null, [
                'label' => 'Description',
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Image (URL)',
            ])
            ->add('video', UrlType::class, [
                'label' => 'Vidéo (URL)',
                'required' => false,
            ])
            ->add('website', UrlType::class, [
                'label' => 'Site Web (URL)',
                'required' => false,
            ])
            ->add('facebook', UrlType::class, [
                'label' => 'Facebook (URL)',
                'required' => false,
            ])
            ->add('twitter', UrlType::class, [
                'label' => 'Twitter (URL)',
                'required' => false,
            ])
            ->add('instagram', UrlType::class, [
                'label' => 'Instagram (URL)',
                'required' => false,
            ])
            ->add('spotify', UrlType::class, [
                'label' => 'Spotify (URL)',
                'required' => false,
            ])
            ->add('snapchat', UrlType::class, [
                'label' => 'Snapchat (URL)',
                'required' => false,
            ])
            ->add('tiktok', UrlType::class, [
                'label' => 'TikTok (URL)',
                'required' => false,
            ])
            ->add('genres', EntityType::class, [
                'label' => 'Genres',
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
