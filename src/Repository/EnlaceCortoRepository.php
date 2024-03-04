<?php

namespace App\Repository;

use App\Entity\EnlaceCorto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnlaceCorto|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnlaceCorto|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnlaceCorto[]    findAll()
 * @method EnlaceCorto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnlaceCortoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnlaceCorto::class);
    }

    public function findAllEnlaces($search = null): QueryBuilder
    {
        $qb = $this->createQueryBuilder('e')
            ->orderBy('e.linkRoute', 'ASC')
        ;
        if ($search) {
            $qb->where('e.enlace LIKE :param OR e.linkRoute LIKE :param')
                ->setParameter('param', '%'.$search.'%');
        }

        return $qb;
    }

    /*
    public function findOneBySomeField($value): ?EnlaceCorto
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
