<?php

namespace App\Repository;

use App\Entity\Usuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuarios[]    findAll()
 * @method Usuarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuarios::class);
    }

    // /**
    //  * @return Usuarios[] Returns an array of Usuarios objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuarios
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
