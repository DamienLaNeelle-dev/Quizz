<?php

namespace App\Repository;

use App\Entity\ResponseLv1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResponseLv1>
 *
 * @method ResponseLv1|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponseLv1|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponseLv1[]    findAll()
 * @method ResponseLv1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponseLv1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponseLv1::class);
    }

    public function save(ResponseLv1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResponseLv1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByQuestionId($questionId)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.question_lv1_id = :questionId')
            ->setParameter('questionId', $questionId)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return ResponseLv1[] Returns an array of ResponseLv1 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ResponseLv1
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
