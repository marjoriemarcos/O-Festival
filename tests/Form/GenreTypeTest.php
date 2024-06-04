<?php

namespace App\Tests\Form;

use App\Entity\Genre;
use App\Form\GenreType;
use Symfony\Component\Form\Test\TypeTestCase;

class GenreTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name' => 'Rock',
        ];

        $genre = new Genre();
        $form = $this->factory->create(GenreType::class, $genre);

        // Soumettre les données du formulaire
        $form->submit($formData);

        // Vérifier si le formulaire est synchronisé et valide
        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->isValid());

        // Vérifier si les données du formulaire sont correctement mises à jour dans l'entité
        $this->assertEquals('Rock', $genre->getName());
    }

    /*public function testSubmitInvalidData(): void
    {
        $formData = [
            'name' => '',
        ];

        $genre = new Genre();
        $form = $this->factory->create(GenreType::class, $genre);

        $form->submit($formData);

        $this->assertFalse($form->isSynchronized());
        $this->assertFalse($form->isValid());
    }*/
}
