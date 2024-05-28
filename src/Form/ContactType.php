<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('name', TextType::class, [
            'label' => 'Votre nom',
            'attr' => [
                'class' => 'form-control open-font',
                'placeholder' => 'Entrez votre nom',
            ],
            'label_attr' => [
                'class' => 'light-yellow-txt',
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Votre email',
            'attr' => [
                'class' => 'form-control open-font',
                'placeholder' => 'Entrez votre email',
            ],
            'label_attr' => [
                'class' => 'light-yellow-txt',
            ],
        ])
        ->add('content', TextareaType::class, [
            'label' => 'Votre message',
            'attr' => [
                'class' => 'form-control open-font',
                'rows' => 3,
                'placeholder' => 'Entrez votre message',
            ],
            'label_attr' => [
                'class' => 'light-yellow-txt',
            ]
        ])

        ->add('save', SubmitType::class, [
            'label' => 'Envoyer',
            'attr' => [
                'class' => 'btn btn-primary light-yellow-bg dark-blue-txt',
            ]

        ])
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => ContactDTO::class,
    ]);
}
}
