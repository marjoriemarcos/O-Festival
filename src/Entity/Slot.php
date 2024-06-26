<?php

namespace App\Entity;

use App\Repository\SlotRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use IntlDateFormatter;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SlotRepository::class)]
class Slot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 64)]
    private ?string $hour = null;

    #[ORM\Column]    
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]    
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(inversedBy: 'slot', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private ?Artist $artist = null;

    #[ORM\ManyToOne(inversedBy: 'slots')]
    #[Assert\NotNull]
    private ?Stage $stage = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $day = null;

    public function __construct()
    {        
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * Formate la date au format "Jeudi 23 Mai 2024"
     *
     * @return string|null
     */
    public function getFormattedDate(): ?string
    {
        // Vérifier si la date est définie
        if ($this->date !== null) {
            // Créer un objet DateTime à partir du timestamp de la date
            $dateTime = new DateTime('@' . $this->date->getTimestamp());
            
            // Créer un formateur de date avec la locale française
            $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
            
            // Formater la date selon le format souhaité
            $formattedDate = $formatter->format($dateTime);
            
            return $formattedDate;
        } else {
            return null;
        }
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHour(): string
    {
        return $this->hour;
    }

    public function setHour(string $hour): static
    {
        $this->hour = $hour;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): static
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): static
    {
        $this->day = $day;

        return $this;
    }
}
