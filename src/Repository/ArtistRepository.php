<?php

namespace App\Repository;

use App\Entity\Artist;
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
    public function findArtistsWithSlots(): array
    {
        return $this->createQueryBuilder('artist')
        ->leftJoin('App\Entity\Slot', 'slot', 'WITH', 'slot.artist = artist.id')
        ->where('slot.id IS NOT NULL')
        ->orderBy('artist.name', 'ASC')
        ->getQuery()
        ->getResult();
}
}
