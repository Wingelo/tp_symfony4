<?php

namespace App\Repository;

use App\Entity\NameCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NameCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method NameCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method NameCategory[]    findAll()
 * @method NameCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NameCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NameCategory::class);
    }

    // /**
    //  * @return NameCategory[] Returns an array of NameCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NameCategory
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
