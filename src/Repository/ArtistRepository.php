<?php

namespace App\Repository;

use App\Entity\Artist;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artist>
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    /**
     * Récupère tous les artistes ayant des slots associés dans la base de données.
     *
     * @return Artist[]
     */
    public function findAllArtistsWithSlot(): array
    {
        return $this->createQueryBuilder('artist')
            // Utilisation d'une jointure interne pour inclure uniquement les artistes avec des slots
            ->innerJoin('App\Entity\Slot', 'slot', 'WITH', 'slot.artist = artist.id')
            // Filtre pour inclure uniquement les artistes ayant des slots
            ->where('slot.id IS NOT NULL')
            // Tri par ordre croissant des jours
            ->orderBy('slot.date', 'ASC')
            // Récupération de la requête
            ->getQuery()
            // Exécution de la requête et récupération des résultats
            ->getResult();
    }

    /**
     * Récupère les artistes associés à une date spécifique
     *
     * @param string $date La date au format 'Y-m-d'
     * @return Artiste[] Les artistes associés à la date spécifiée
     */
    public function findBySlotDate(string $date): array
    {
        return $this->createQueryBuilder('artist')
            ->innerJoin('artist.slot', 'slot')
            // Ajoute une condition pour filtrer les artistes ayant des slots à la date spécifiée
            ->andWhere('slot.date = :date')
            // Définit le paramètre 'date' dans la requête avec la valeur fournie
            ->setParameter('date', $date)
            // Récupération de la requête
            ->getQuery()
            // Exécution de la requête et récupération des résultats
            ->getResult();
    }


    /**
     * Récupère un artiste avec des slots associés par son ID.
     *
     * @param int $id
     * @return Artist|null
     */
    public function findArtistWithSlot(int $id): ?Artist
    {
        return $this->createQueryBuilder('artist')
            // Utilisation d'une jointure interne pour inclure uniquement les artistes avec des slots
            ->innerJoin('App\Entity\Slot', 'slot', 'WITH', 'slot.artist = artist.id')
            // Filtre pour inclure uniquement l'artiste avec l'ID spécifié
            ->where('artist.id = :id')
            // Attribution de la valeur du paramètre ID
            ->setParameter('id', $id)
            // Récupération de la requête
            ->getQuery()
            // Exécution de la requête et récupération d'un seul résultat ou null
            ->getOneOrNullResult();
    }
}
