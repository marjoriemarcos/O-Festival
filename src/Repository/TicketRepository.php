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
        parent::__construct($registry, Ticket::class);
    }

    public function findTicketsByDuration($duration)
    {
        return $this->createQueryBuilder('ticket')
        ->andWhere('ticket.duration = :duration')
        ->setParameter('duration', $duration)
        ->orderBy('ticket.price', 'DESC')
        ->getQuery()
        ->getResult();
}

    /**
     * @return array Returns an array of distinct startAt and endAt with associated fees and prices for a given duration
     */
    public function findDistinctDatesByDuration($days)
    {
        return $this->createQueryBuilder('ticket')
            ->select('MIN(ticket.startAt) as startAt, MAX(ticket.endAt) as endAt, ticket.fee, MAX(ticket.price) as price')
            ->andWhere('DATE_DIFF(ticket.endAt, ticket.startAt) = :days')
            ->setParameter('days', $days)
            ->groupBy('ticket.fee')
            ->orderBy('price', 'DESC')
            ->getQuery()
            ->getResult();
    }



    public function findOpeningAndClosingDates()
    {
        return $this->createQueryBuilder('ticket')
            ->select('MIN(ticket.startAt) as openingDate, MAX(ticket.endAt) as closingDate')
            ->getQuery()
            ->getSingleResult();
    }
}
