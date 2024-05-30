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
        // Add fields to the form
        $builder
            ->add('date', null, [
                'label' => 'Date',
                'widget' => 'single_text',
                'label' => 'slot.form.date',
            ])
            ->add('day', ChoiceType::class, [
                'label' => 'Jour',
                'choices' => [
                    'slot.form.day1' => 'J1',
                    'slot.form.day2' => 'J2',
                    'slot.form.day3' => 'J3',
                ],
                'label' => 'slot.form.day',
            ])
            ->add('hour', TextType::class, [
                'label' => 'slot.form.hour',                
                'attr' => [
                    'placeholder' => 'slot.form.hourPlaceholder',
                ],
            ]);

        // Add the 'artist' field based on context (new/edit)
        if ($options['isNew']) {
            // If it's the "new" form, use a custom query
            $builder->add('artist', EntityType::class, [
                'class' => Artist::class,
                'label' => 'slot.form.artist',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->leftJoin('a.slot', 's')
                        ->where('s.id IS NULL');
                },                
                'choice_label' => 'name',
            ]);
        } else {
            // If it's the "edit" form, display all available artists and select the one already indicated
            $builder->add('artist', EntityType::class, [
                'class' => Artist::class,
                'label' => 'slot.form.artist',
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) use ($options) {
                    $slot = $options['data']; // Get form data
                    $artistId = $slot->getArtist()->getId(); // Get ID of artist associated with the slot

                    return $er->createQueryBuilder('a')
                        ->leftJoin('a.slot', 's')
                        ->where('s.id IS NULL OR s.artist = :artistId')
                        ->setParameter('artistId', $artistId);
                },
            ]);
        }

        // Add the 'stage' field
        $builder->add('stage', EntityType::class, [
            'class' => Stage::class,
            'label' => 'slot.form.stage',
            'choice_label' => 'name',
        ]);

        // Add an event listener to validate the form on submission
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'validate']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Slot::class,
            'isNew' => true, // By default, it's the "new" form
        ]);
    }

    public function validate(FormEvent $event): void
    {
        $form = $event->getForm();
        $slot = $form->getData();

        // Check if the hour is in the correct format
        if (!preg_match('/^\d{2}:\d{2}-\d{2}:\d{2}$/', $slot->getHour())) {
            // Add a form error if the hour format is incorrect
            $form->addError(new FormError('L\'heure doit être au format hh:mm-hh:mm'));
        }

        // Check if it's a new creation
        if ($form->getConfig()->getOption('isNew')) {
            // Check if the date and hour association already exists in another slot
            if (!$this->isDateAndHourUnique($slot)) {
                // Add a form error if the date and hour association is not unique
                $form->addError(new FormError('Ce créneau existe. Merci de choisir un autre horaire.'));
            }
        } else { // If it's an edit
            // Check if the date and hour association already exists in another slot (except the current one)
            if (!$this->isDateAndHourUniqueForEdit($slot)) {
                // Add a form error if the date and hour association is not unique
                $form->addError(new FormError('Un créneau existe déjà à cette date et heure.'));
            }
        }
    }

    private function isDateAndHourUnique(Slot $slot): bool
    {
        // Get the date and hour of the slot
        $date = $slot->getDate();
        $hour = $slot->getHour();
		
        // Get the Slot repository
        $repository = $this->entityManager->getRepository(Slot::class);

        // Search for a slot with the same date and hour
        $existingSlot = $repository->findOneBy(['date' => $date, 'hour' => $hour]);

        // If no slot with the same date and hour is found, the association is unique
        return $existingSlot === null;
    }

    private function isDateAndHourUniqueForEdit(Slot $slot): bool
    {
        // Get the date and hour of the slot
        $date = $slot->getDate();
        $hour = $slot->getHour();
        $slotId = $slot->getId(); // Get the ID of the current slot

        // Get the Slot repository
        $repository = $this->entityManager->getRepository(Slot::class);

        // Get all slots from the database except the current one
        $slots = $repository->createQueryBuilder('s')
            ->where('s.id != :slotId')
            ->setParameter('slotId', $slotId)
            ->getQuery()
            ->getResult();

        // Iterate through all slots
        foreach ($slots as $existingSlot) {
            // Compare the date and hour of each slot with those of the current slot
            if ($existingSlot->getDate() == $date && $existingSlot->getHour() == $hour) {
                // If a match is found, the association is not unique
                return false;
            }
        }

        // If no match is found, the association is unique
        return true;
    }
}
