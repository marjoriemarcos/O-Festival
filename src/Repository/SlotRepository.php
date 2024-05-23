<?php

namespace App\Repository;

use App\Entity\Slot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Slot>
 */
class SlotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slot::class);
    }

    public function findAllSlotWithArtistAndGenreAndStage(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT artist.*,
        GROUP_CONCAT(genre.name SEPARATOR ", ") AS genres,
        slot.id AS slot_id,
        slot.date,
        stage.name AS stage_name
        FROM artist
        INNER JOIN genre_artist 
        ON artist.id = genre_artist.artist_id
        INNER JOIN genre 
        ON genre.id = genre_artist.genre_id
        INNER JOIN slot 
        ON artist.id = slot.artist_id
        INNER JOIN stage 
        ON stage.id = slot.stage_id
        GROUP BY artist.id, slot.id
        ORDER BY artist.name ASC
            ';

        $resultSet = $conn->executeQuery($sql);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findAllSlotWithArtistAndGenreAndStageByParams($date = null, $genre = null, $stage = null): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT artist.*,
                   GROUP_CONCAT(genre.name SEPARATOR ", ") AS genres,
                   slot.id AS slot_id,
                   slot.date,
                   stage.name AS stage_name
            FROM artist
            INNER JOIN genre_artist 
            ON artist.id = genre_artist.artist_id
            INNER JOIN genre 
            ON genre.id = genre_artist.genre_id
            INNER JOIN slot 
            ON artist.id = slot.artist_id
            INNER JOIN stage 
            ON stage.id = slot.stage_id
        ';
    
        $conditions = [];
        $params = [];
    
        if ($date !== null) {
            $conditions[] = 'slot.date = :date';
            $params['date'] = $date;
        }
    
        if ($genre !== null) {
            $conditions[] = 'genre.name = :genre';
            $params['genre'] = $genre;
        }
    
        if ($stage !== null) {
            $conditions[] = 'stage.name = :stage';
            $params['stage'] = $stage;
        }
    
        if (count($conditions) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }
    
        $sql .= '
            GROUP BY artist.id, slot.id, slot.date, stage.name
            ORDER BY artist.name ASC
        ';
    
        $resultSet = $conn->executeQuery($sql, $params);
    
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function findArtistWithSlotAndGenreAndStage($artist): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT artist.*,
            GROUP_CONCAT(genre.name SEPARATOR ", ") AS genres,
            slot.id AS slot_id,
            slot.date,
            stage.name AS stage_name
            FROM artist
            INNER JOIN genre_artist 
            ON artist.id = genre_artist.artist_id
            INNER JOIN genre 
            ON genre.id = genre_artist.genre_id
            INNER JOIN slot 
            ON artist.id = slot.artist_id
            INNER JOIN stage 
            ON stage.id = slot.stage_id
            WHERE artist.id = :artist
            GROUP BY artist.id, slot.id
            ';

        $resultSet = $conn->executeQuery($sql, ['artist' => $artist]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return Slot[] Returns an array of Slot objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Slot
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
