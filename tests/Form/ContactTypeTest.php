<?php

namespace App\Tests\Form;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Component\Form\Test\TypeTestCase;


class ContactTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name'    => 'Ofestival',
            'email'   => 'ofestival@example.com',
            'content' => 'Yo je suis un test',
        ];

        $model = new ContactDTO();
        $form = $this->factory->create(ContactType::class, $model);

        // Submit the form data
        $form->submit($formData);

        // Check if the form is synchronized
        $this->assertTrue($form->isSynchronized());

        // Check if the form data is correct
        $this->assertSame($formData['name'], $model->name);
        $this->assertSame($formData['email'], $model->email);
        $this->assertSame($formData['content'], $model->content);
    }

}



