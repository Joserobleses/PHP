<?php

namespace App\Repository;

use App\Entity\Place;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Place|null find($id, $lockMode = null, $lockVersion = null)
 * @method Place|null findOneBy(array $criteria, array $orderBy = null)
 * @method Place[]    findAll()
 * @method Place[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Place::class);
    }

    // /**
    //  * @return Place[] Returns an array of Place objects
    //  */
    
    public function paginate($dql, $page = 1, $limit =10):Paginator{
        $paginator = new Paginator($dql);
        
        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit);
        
        return $paginator;
    }
    
    public function findAllPlaces($paginaActual = 1, $limite = 10):Paginator{
        $consulta = $this->getEntityManager()->createQuery('SELECT p  FROM App\Entity\Place p ORDER BY p.id DESC');
        
        return $this->paginate($consulta, $paginaActual, $limite);
    }
    
    public function findPlacesFromActualUser($paginaActual = 1, $limite = 10):Paginator{
        $consulta = $this->getEntityManager()->createQuery('SELECT p  FROM App\Entity\Place p WHERE user_id=1 ORDER BY p.id DESC');
        
        return $this->paginate($consulta, $paginaActual, $limite);
    }
    
    public function findLastWithPhoto(int $limit){
        return $this->getEntityManager()->createQuery(
            'SELECT p  
            FROM App\Entity\Place p
            WHERE p.foto IS NOT NULL
            ORDER BY p.id DESC')
            ->setMaxResults($limit)
            ->getResult();
    }
    
}
