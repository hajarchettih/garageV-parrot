<?php

namespace App\Repository;

use App\Entity\Temoignages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Temoignages>
 */
class TemoignagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Temoignages::class);
    }

    // Ajoutez la méthode pour récupérer les témoignages approuvés ici
    public function findApprovedTemoignages()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.approved = :approved')
            ->setParameter('approved', true)
            ->getQuery()
            ->getResult();
    }
}
