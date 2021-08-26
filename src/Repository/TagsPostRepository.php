<?php

namespace App\Repository;

use App\Entity\TagsPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TagsPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagsPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagsPost[]    findAll()
 * @method TagsPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagsPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagsPost::class);
    }

    // /**
    //  * @return TagsPost[] Returns an array of TagsPost objects
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
    public function findOneBySomeField($value): ?TagsPost
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
