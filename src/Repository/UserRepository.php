<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * Find users by role
     *
     * @param string $role
     * @return User[]
     */
    public function findByRole(string $role): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%"' . $role . '"%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche des utilisateurs par nom de famille.
     *
     * @param string $search Terme de recherche
     * @return array Retourne un tableau d'objets User
     */
    public function findByLastNameSearch($search): array
    {
        // Création d'un QueryBuilder pour l'entité 'User' aliasée en 'u'
        return $this->createQueryBuilder('u')
            // Ajout d'une condition WHERE pour filtrer les utilisateurs par nom de famille
            ->where('u.lastname LIKE :search')
            // Définition du paramètre 'search' en ajoutant des wildcards (%) pour une recherche partielle
            ->setParameter('search', '%' . $search . '%')
            // Tri des résultats par nom de famille dans l'ordre croissant
            ->orderBy('u.lastname', 'ASC')
            // Exécution de la requête et récupération des résultats
            ->getQuery()
            ->getResult();
    }
}
