<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'artist.form.name',
            ])
            ->add('description', null, [
                'label' => 'artist.form.description',
            ])
            ->add('picture', UrlType::class, [
                'label' => 'artist.form.picture',
            ])
            ->add('video', UrlType::class, [
                'label' => 'artist.form.video',
                'required' => false,
            ])
            ->add('website', UrlType::class, [
                'label' => 'artist.form.website',
                'required' => false,
            ])
            ->add('facebook', UrlType::class, [
                'label' => 'artist.form.facebook',
                'required' => false,
            ])
            ->add('twitter', UrlType::class, [
                'label' => 'artist.form.twitter',
                'required' => false,
            ])
            ->add('instagram', UrlType::class, [
                'label' => 'artist.form.instagram',
                'required' => false,
            ])
            ->add('spotify', UrlType::class, [
                'label' => 'artist.form.spotify',
                'required' => false,
            ])
            ->add('snapchat', UrlType::class, [
                'label' => 'artist.form.snapchat',
                'required' => false,
            ])
            ->add('tiktok', UrlType::class, [
                'label' => 'artist.form.tiktok',
                'required' => false,
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'label' => 'artist.form.genres',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
