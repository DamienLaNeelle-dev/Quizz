<?php

namespace App\Repository;

use App\Entity\ResponseLv3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResponseLv3>
 *
 * @method ResponseLv3|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponseLv3|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponseLv3[]    findAll()
 * @method ResponseLv3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponseLv3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponseLv3::class);
    }

    public function save(ResponseLv3 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResponseLv3 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByQuestionId($questionId)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.question_lv3_id = :questionId')
            ->setParameter('questionId', $questionId)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return ResponseLv3[] Returns an array of ResponseLv3 objects
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

//    public function findOneBySomeField($value): ?ResponseLv3
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
