<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank(message: 'Merci d\'indiquer votre nom')]
    #[Assert\Length(min: 3, max: 200, minMessage: '3 caractères minimum')]
    public ?string $name = '';

    #[Assert\NotBlank(message: 'Merci de remplir votre email')]
    #[Assert\Email(message: 'Votre email n\'est pas valide')]
    public ?string $email = '';

    #[Assert\NotBlank(message: 'Merci de remplir ce champ')]
    #[Assert\Length(min: 3, max: 200, minMessage: '3 caractères minimum')]
    public ?string $content = '';
}