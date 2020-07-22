<?php

namespace App\Repository;

use App\Entity\Instrumental;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Instrumental|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instrumental|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instrumental[]    findAll()
 * @method Instrumental[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instrumental::class);
    }

    // /**
    //  * @return Instrumental[] Returns an array of Instrumental objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Instrumental
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
