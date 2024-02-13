<?php

namespace App\Repository;

use App\Entity\Corazon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Corazon>
 *
 * @method Corazon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Corazon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Corazon[]    findAll()
 * @method Corazon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorazonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Corazon::class);
    }

    public function add(Corazon $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Corazon $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function countCorazones()
    {
        return $this->createQueryBuilder('corazon')
            ->select('SUM(corazon.promise * corazon.meses) as promesas, COUNT(corazon.promise) as personas')
            ->getQuery()
            ->getArrayResult();
    }

    // /**
    //  * @return Corazon[] Returns an array of Corazon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Corazon
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
