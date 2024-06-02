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




    public function findTicketsByParams($type, $startAt, $endAt, $fee)
    {
        $conn = $this->getEntityManager()->getConnection();
    
        // Construction de la requête SQL
        $sql = '
            SELECT * FROM ticket t
            WHERE t.type = :type
            AND t.start_at = :startAt
            AND t.end_at = :endAt
            AND t.fee = :fee
        ';
    //WHERE LEFT(t.title, 6) LIKE :title
        // Formatage des dates en chaînes de caractères
        if ($startAt instanceof \DateTimeInterface) {
            $startAtFormatted = $startAt->format('Y-m-d H:i:s');
        } else {
            throw new \InvalidArgumentException('startAt doit être une instance de \DateTimeInterface.');
        }
    
        if ($endAt instanceof \DateTimeInterface) {
            $endAtFormatted = $endAt->format('Y-m-d H:i:s');
        } else {
            throw new \InvalidArgumentException('endAt doit être une instance de \DateTimeInterface.');
        }
    
        // Préparation de la requête avec les paramètres
        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery([
            'type' => $type,
            'startAt' => $startAtFormatted,
            'endAt' => $endAtFormatted,
            'fee' => $fee,
        ]);
    
        // Retourne les résultats sous forme de tableau d'associations
        return $result->fetchAllAssociative();
    }
}


