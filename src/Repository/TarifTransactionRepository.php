<?php

namespace App\Repository;

use App\Entity\TarifTransaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TarifTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifTransaction[]    findAll()
 * @method TarifTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifTransaction::class);
    }

    // /**
    //  * @return TarifTransaction[] Returns an array of TarifTransaction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TarifTransaction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
