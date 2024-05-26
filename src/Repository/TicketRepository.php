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
    
    /**
     * @return array Returns an array of distinct fees with associated prices for a given duration
     */
    public function findDistinctFeesByDuration($days)
    {
        return $this->createQueryBuilder('ticket')
            ->select('ticket.fee, MAX(ticket.price) as price')
            ->andWhere('DATE_DIFF(ticket.endAt, ticket.startAt) = :days')
            ->setParameter('days', $days)
            ->groupBy('ticket.fee')
            ->orderBy('price', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
