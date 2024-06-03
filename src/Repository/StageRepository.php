<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stage>
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }
        
    /**
     * Retrieves all stages that are associated with at least one slot.
     *   
     * @return Stage[] Returns an array of Stage entities that have associated slots.
     */
    public function findStagesWithSlots(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.slots', 'slot')
            ->getQuery()
            ->getResult();
    }

    /**
     * Finds stages by their name using a partial match.
     *
     * @param string $search The search term.
     * @return Stage[] The stages matching the search term.
     */
    public function findByNameSearch($search): array
    {
        // Création d'un QueryBuilder pour l'entité 'Stage' aliasée en 'g'
        return $this->createQueryBuilder('s')
            // Ajout d'une sélection de l'entité Stage
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
