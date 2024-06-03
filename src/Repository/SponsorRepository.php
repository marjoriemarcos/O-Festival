<?php

namespace App\Repository;

use App\Entity\Sponsor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sponsor>
 */
class SponsorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sponsor::class);
    }

    /**
     * Finds sponsors by their name using a partial match.
     *
     * @param string $search The search term.
     * @return Sponsor[] The sponsors matching the search term.
     */
    public function findByNameSearch($search): array
    {
        // Création d'un QueryBuilder pour l'entité 'Sponsor' aliasée en 's'
        return $this->createQueryBuilder('s')
            // Ajout d'une sélection de l'entité Sponsor
            ->select('s')
            // Ajout d'une condition WHERE pour filtrer les scènes dont le nom correspond au terme de recherche
            ->where('s.name LIKE :search')
            // Définition du paramètre 'search' en ajoutant des wildcards (%) pour une recherche partielle
            ->setParameter('search', '%' . $search . '%')
            // Tri des résultats par nom dans l'ordre croissant
            ->orderBy('s.name', 'ASC')
            // Exécution de la requête et récupération des résultats
            ->getQuery()
            ->getResult();
    }
}
