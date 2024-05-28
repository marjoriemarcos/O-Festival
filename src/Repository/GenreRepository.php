<?php

namespace App\Repository;

use App\Entity\Genre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Genre>
 */
class GenreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genre::class);
    }

   /**
    * @return Genre[] Returns an array of 4 Genre objects
    */
   public function limitedGenre(): array
   {
    return $this->createQueryBuilder('g')
           ->orderBy('g.id', 'ASC')
           ->setMaxResults(4)
           ->getQuery()
           ->getResult()
       ;
   }

    /**
     * Récupère les genres des artistes présents dans les slots.
     *
     * @return Genre[] Returns an array of Genre objects
     */
    public function findGenresOfArtistsWithSlot(): array
    {
        return $this->createQueryBuilder('g')
            ->innerJoin('g.artists', 'a') // Joindre la table pivot via l'entité Artist
            ->innerJoin('App\Entity\Slot', 's', 'WITH', 's.artist = a.id') // Joindre les slots
            ->groupBy('g.id') // Regrouper par genre pour éviter les doublons
            ->getQuery()
            ->getResult();
    }
//    public function findOneBySomeField($value): ?Genre
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
