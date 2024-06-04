<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ticket>
 */
class TicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        // Appelle le constructeur parent avec le registre et la classe des entités Ticket
        parent::__construct($registry, Ticket::class);
    }

    /**
     * Trouve les billets par durée.
     *
     * @param int $duration La durée des billets
     * @return array Retourne un tableau de billets avec la durée spécifiée, trié par prix décroissant
     */
    public function findTicketsByDuration($duration)
    {
        return $this->createQueryBuilder('ticket')
            // Sélectionne les billets avec la durée spécifiée
            ->andWhere('ticket.duration = :duration')
            ->setParameter('duration', $duration)
            // Trie les résultats par prix décroissant
            ->orderBy('ticket.price', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les dates distinctes par durée.
     *
     * @param int $days La durée en jours
     * @return array Retourne un tableau de dates distinctes de début et de fin avec les tarifs et les prix associés pour une durée donnée
     */
    public function findDistinctDatesByDuration($days)
    {
        return $this->createQueryBuilder('ticket')
            // Sélectionne les dates de début et de fin distinctes pour une durée donnée
            ->select('MIN(ticket.startAt) as startAt, MAX(ticket.endAt) as endAt, ticket.fee, MAX(ticket.price) as price')
            ->andWhere('DATE_DIFF(ticket.endAt, ticket.startAt) = :days')
            ->setParameter('days', $days)
            ->groupBy('ticket.fee')
            // Trie les résultats par prix décroissant
            ->orderBy('price', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les dates d'ouverture et de fermeture.
     *
     * @return array Retourne un tableau contenant les dates d'ouverture et de fermeture de la vente des billets
     */
    public function findOpeningAndClosingDates()
    {
        return $this->createQueryBuilder('ticket')
            // Sélectionne la date d'ouverture la plus ancienne et la date de fermeture la plus récente
            ->select('MIN(ticket.startAt) as openingDate, MAX(ticket.endAt) as closingDate')
            ->getQuery()
            ->getSingleResult();
    }




    public function findTicketsByParams($type, $startAt, $endAt, $fee, $id = null)
    {
        $entityManager = $this->getEntityManager();
    
        // Construction de la requête DQL
        $dql = '
            SELECT t
            FROM App\Entity\Ticket t
            WHERE t.type = :type
            AND t.startAt = :startAt
            AND t.endAt = :endAt
            AND t.fee = :fee
        ';
    
        // Ajout conditionnel du paramètre id
        if ($id !== null) {
            $dql .= ' AND t.id != :id';
        }
    
        $query = $entityManager->createQuery($dql);
    
        // Préparation des paramètres
        $query->setParameter('type', $type);
        
        if ($startAt instanceof \DateTimeInterface) {
            $query->setParameter('startAt', $startAt);
        } else {
            throw new \InvalidArgumentException('startAt doit être une instance de \DateTimeInterface.');
        }
        
        if ($endAt instanceof \DateTimeInterface) {
            $query->setParameter('endAt', $endAt);
        } else {
            throw new \InvalidArgumentException('endAt doit être une instance de \DateTimeInterface.');
        }
        
        $query->setParameter('fee', $fee);
    
        // Ajout conditionnel du paramètre id
        if ($id !== null) {
            $query->setParameter('id', $id);
        }
    
        // Exécution de la requête et retour des résultats
        return $query->getResult();
    }
    


}


