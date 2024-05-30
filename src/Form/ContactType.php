<?php

// src/Form/ContactType.php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'contact.form.name',
                'label_attr' => [
                    'class' => 'light-yellow-txt'
                ],
                'attr' => [
                    'class' => 'form-control open-font',
                    'placeholder' => 'contact.form.name_placeholder',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'contact.form.name_required']),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'contact.form.email',
                'attr' => [
                    'class' => 'form-control open-font',
                    'placeholder' => 'contact.form.email_placeholder',
                ],
                'label_attr' => [
                    'class' => 'light-yellow-txt',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'contact.form.email_required']),
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'contact.form.message',
                'attr' => [
                    'class' => 'form-control open-font',
                    'rows' => 3,
                    'placeholder' => 'contact.form.message_placeholder',
                ],
                'label_attr' => [
                    'class' => 'light-yellow-txt',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'contact.form.message_required']),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'contact.form.submit',
                'attr' => [
                    'class' => 'btn btn-primary light-yellow-bg dark-blue-txt',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }
}

