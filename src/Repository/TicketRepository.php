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


    public function findTicketsByPArams($title, $startAt, $endAt, $fee )
    {
        return $this->createQueryBuilder('ticket')
            // Sélectionne les billets avec la durée spécifiée
            ->where('ticket.title = :title')
            ->andWhere('ticket.startAt = :startAt')
            ->andWhere('ticket.endAt = :endAt')
            ->andWhere('ticket.fee = :fee')
            ->setParameter('title', $title)
            ->setParameter('startAt', $startAt)
            ->setParameter('endAt', $endAt)
            ->setParameter('fee', $fee)
            // Trie les résultats par prix décroissant
            ->getQuery()
            ->getResult();
    }
}