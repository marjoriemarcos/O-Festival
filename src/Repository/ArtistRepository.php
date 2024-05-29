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

    /**
     * Récupère slot et genre de tous les artiste 
     *
     * @param string $date format date
     * @param int $genre id d'un genre
     * @param int $stage id d'une scène
     * @return Artist|null
     */
    public function findAllArtistByParams($date = null, $genre = null, $stage = null): array
    {
        $conn = $this->getEntityManager()->getConnection();

        // La requetes SQL qui permet de récupèrer les slot + les genres d'un artiste
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
        // Si $date n'est pas null alors on le met dans $condition
        if ($date !== null) {
            $conditions[] = 'slot.date = :date';
            $params['date'] = $date;
        }
        // Si $genre n'est pas null alors on le met dans $condition
        if ($genre !== null) {
            $conditions[] = 'genre.id = :genre';
            $params['genre'] = $genre;
        }
        // Si $genre n'est pas null alors on le met dans $condition
        if ($stage !== null) {
            $conditions[] = 'stage.id = :stage';
            $params['stage'] = $stage;
        }
        // Si $condition est supérieur à 0 alors on ajoute à $sql la fin de la requete
        if (count($conditions) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }
        // Puis ont rajoute la fin de la requete SQL
        $sql .= '
            GROUP BY artist.id, slot.id, slot.date, stage.name
            ORDER BY slot.date ASC
        ';
    
        $resultSet = $conn->executeQuery($sql, $params);
    
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
}
