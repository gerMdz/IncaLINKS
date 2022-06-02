<?php

namespace App\Repository;

use App\Entity\Countandadd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Countandadd>
 *
 * @method Countandadd|null find($id, $lockMode = null, $lockVersion = null)
 * @method Countandadd|null findOneBy(array $criteria, array $orderBy = null)
 * @method Countandadd[]    findAll()
 * @method Countandadd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountandaddRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Countandadd::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Countandadd $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Countandadd $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Countandadd[] Returns an array of Countandadd objects
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
    public function findOneBySomeField($value): ?Countandadd
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function countCorazones()
    {
        return $this->createQueryBuilder('corazon')
            ->select('corazon.totalPromises as promesas, corazon.totalPeople as personas')
            ->getQuery()
            ->getArrayResult();
    }
}
