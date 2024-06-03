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

    /**
     * Finds genres by their name using a partial match.
     *
     * @param string $search The search term.
     * @return Genre[] The genres matching the search term.
     */
    public function findByNameSearch($search): array
    {
        // Création d'un QueryBuilder pour l'entité 'Genre' aliasée en 'g'
        return $this->createQueryBuilder('g')
            // Ajout d'une sélection de l'entité Genre
            ->select('g')
            // Ajout d'une condition WHERE pour filtrer les genres dont le nom correspond au terme de recherche
            ->where('g.name LIKE :search')
            // Définition du paramètre 'search' en ajoutant des wildcards (%) pour une recherche partielle
            ->setParameter('search', '%' . $search . '%')
            // Tri des résultats par nom dans l'ordre croissant
            ->orderBy('g.name', 'ASC')
            // Exécution de la requête et récupération des résultats
            ->getQuery()
            ->getResult();
    }
}
