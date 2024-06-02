<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customer>
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
     * Finds customers by their name using a partial match and includes ticket information.
     *
     * @param string $search The search term.
     * @return Customer[] The customers matching the search term.
     */
    public function findByLastNameSearch($search): array
    {
        // Création d'un QueryBuilder pour l'entité 'Customer' aliasée en 'c'
        return $this->createQueryBuilder('c')
            // Ajout d'une sélection de l'entité Customer et les informations de la table pivot customer_ticket
            ->select('c', 't')
            ->leftJoin('c.tickets', 't') // Jointure avec la table des tickets
            // Ajout d'une condition WHERE pour filtrer les clients dont le nom correspond au terme de recherche
            ->where('c.lastname LIKE :search')
            // Définition du paramètre 'search' en ajoutant des wildcards (%) pour une recherche partielle
            ->setParameter('search', '%' . $search . '%')
            // Tri des résultats par nom dans l'ordre croissant
            ->orderBy('c.lastname', 'ASC')
            // Exécution de la requête et récupération des résultats
            ->getQuery()
            ->getResult();
    }
}
