<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
     ;

        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placehold' => 'laura06@gmail.com']
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastname',  TextType::class, [
                'label' => 'Nom',
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôle',
                'multiple' => true,
                'expanded' => true, // Ajout de cette ligne pour afficher les choix comme des cases à cocher
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                ],
 
            ]);
            // Check if it's a form add or a form edit
             if ($options['is_add']) {
                $builder->add('password', PasswordType::class);
            }
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_add' => false, 
        ]);
    }
}
