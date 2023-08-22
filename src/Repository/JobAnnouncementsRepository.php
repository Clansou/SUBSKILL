<?php

namespace App\Repository;

use App\Entity\JobAnnouncements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JobAnnouncements>
 *
 * @method JobAnnouncements|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobAnnouncements|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobAnnouncements[]    findAll()
 * @method JobAnnouncements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobAnnouncementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobAnnouncements::class);
    }

//    /**
//     * @return JobAnnouncements[] Returns an array of JobAnnouncements objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JobAnnouncements
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
