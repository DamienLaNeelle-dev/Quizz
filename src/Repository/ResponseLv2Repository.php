<?php

namespace App\Repository;

use App\Entity\ResponseLv2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResponseLv2>
 *
 * @method ResponseLv2|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponseLv2|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponseLv2[]    findAll()
 * @method ResponseLv2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponseLv2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponseLv2::class);
    }

    public function save(ResponseLv2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResponseLv2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByQuestionId($questionId)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.question_lv2_id = :questionId')
            ->setParameter('questionId', $questionId)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return ResponseLv2[] Returns an array of ResponseLv2 objects
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

//    public function findOneBySomeField($value): ?ResponseLv2
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
