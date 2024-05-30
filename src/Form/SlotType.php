<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Slot;
use App\Entity\Stage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlotType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Ajoute les champs au formulaire
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('day', ChoiceType::class, [
                'choices' => [
                    'Jour 1' => 'J1',
                    'Jour 2' => 'J2',
                    'Jour 3' => 'J3',
                ],
            ])
            ->add('hour', TextType::class, [
                'label' => 'Heure',
                'attr' => [
                    'placeholder' => 'hh:mm-hh:mm',
                ],
            ]);

        // Ajoute le champ 'artist' en fonction du contexte (new/edit)
        if ($options['isNew']) {
            // Si c'est le formulaire "new", utilise une requête personnalisée
            $builder->add('artist', EntityType::class, [
                'class' => Artist::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->leftJoin('a.slot', 's')
                        ->where('s.id IS NULL');
                },
                'choice_label' => 'name',
            ]);
        } else {
            // Si c'est le formulaire "edit", affiche tous les artistes disponibles et sélectionne celui qui est déjà indiqué
            $builder->add('artist', EntityType::class, [
                'class' => Artist::class,
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) use ($options) {
                    $slot = $options['data']; // Récupérer les données du formulaire
                    $artistId = $slot->getArtist()->getId(); // Récupérer l'ID de l'artiste associé au slot

                    return $er->createQueryBuilder('a')
                        ->leftJoin('a.slot', 's')
                        ->where('s.id IS NULL OR s.artist = :artistId')
                        ->setParameter('artistId', $artistId);
                },
            ]);
        }

        // Ajoute le champ 'stage'
        $builder->add('stage', EntityType::class, [
            'class' => Stage::class,
            'choice_label' => 'name',
        ]);

        // Ajoute un écouteur d'événements pour valider le formulaire lors de la soumission
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'validate']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Slot::class,
            'isNew' => true, // Par défaut, c'est le formulaire "new"
        ]);
    }

    public function validate(FormEvent $event): void
    {
        $form = $event->getForm();
        $slot = $form->getData();

        // Vérifie si l'heure est au bon format
        if (!preg_match('/^\d{2}:\d{2}-\d{2}:\d{2}$/', $slot->getHour())) {
            // Ajoute une erreur de formulaire si le format de l'heure est incorrect
            $form->addError(new FormError('L\'heure doit être au format hh:mm-hh:mm'));
        }

        // Vérifie si c'est une nouvelle création
        if ($form->getConfig()->getOption('isNew')) {
            // Vérifie si l'association date et heure existe déjà dans un autre slot
            if (!$this->isDateAndHourUnique($slot)) {
                // Ajoute une erreur de formulaire si l'association date et heure n'est pas unique
                $form->addError(new FormError('Ce créneau existe déjà. Veuillez changer le jour ou l\'heure de passage.'));
            }
        } else { // Si c'est une édition
            // Vérifie si l'association date et heure existe déjà dans un autre slot (sauf celui actuel)
            if (!$this->isDateAndHourUniqueForEdit($slot)) {
                // Ajoute une erreur de formulaire si l'association date et heure n'est pas unique
                $form->addError(new FormError('Un autre créneau existe déjà avec cette date et cette heure.'));
            }
        }
    }

    private function isDateAndHourUnique(Slot $slot): bool
    {
        // Récupère la date et l'heure du slot
        $date = $slot->getDate();
        $hour = $slot->getHour();
    
        // Récupère le repository Slot
        $repository = $this->entityManager->getRepository(Slot::class);
    
        // Recherche un slot avec la même date et heure
        $existingSlot = $repository->findOneBy(['date' => $date, 'hour' => $hour]);
    
        // Si aucun slot avec la même date et heure n'est trouvé, l'association est unique
        return $existingSlot === null;
    }


    private function isDateAndHourUniqueForEdit(Slot $slot): bool
    {
        // Récupère la date et l'heure du slot
        $date = $slot->getDate();
        $hour = $slot->getHour();
        $slotId = $slot->getId(); // Récupérer l'ID du slot actuel

        // Récupère le repository Slot
        $repository = $this->entityManager->getRepository(Slot::class);

        // Récupère tous les slots de la base de données, sauf celui actuel
        $slots = $repository->createQueryBuilder('s')
            ->where('s.id != :slotId')
            ->setParameter('slotId', $slotId)
            ->getQuery()
            ->getResult();

        // Parcourt tous les slots
        foreach ($slots as $existingSlot) {
            // Compare la date et l'heure de chaque slot avec celles du slot actuel
            if ($existingSlot->getDate() == $date && $existingSlot->getHour() == $hour) {
                // Si une correspondance est trouvée, l'association n'est pas unique

                return false;
            }
        }

        // Si aucune correspondance n'est trouvée, l'association est unique
        return true;
    }
}

