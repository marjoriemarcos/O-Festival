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
                'label' => 'user.form.mail',
                'attr' => [
                    'placehold' => 'user.form.mailPlaceholder']
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'user.form.firstname',
            ])
            ->add('lastname',  TextType::class, [
                'label' => 'user.form.lastname',
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'user.form.roles',
                'multiple' => true,
                'expanded' => true, // adding checkboxes for multiple choices
                'choices' => [
                    'user.form.rolesAdmin' => 'ROLE_ADMIN',
                ],
 
            ]);
            // Check if it's a form add or a form edit
             if ($options['is_add']) {
                $builder->add('password', PasswordType::class, [
                    'label' => 'user.form.password',
                    'attr' => [
                        'placehold' => 'user.form.passwordPlaceholder']
                ]);
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
