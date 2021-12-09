<?php

namespace App\Service;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Security;
class PaginatorService{
    
    private $limit, $entityManager, $entityType = '', $total = 0;
    
    public function __construct(int $limit = 10, EntityManagerInterface $entityManager){
        $this->limit = $limit;
        $this->entityManager = $entityManager;
    }
    
    public function setEntityType($entityType){
            $this->entityType = $entityType;
    }
    public function getTotal():int{
        return $this->total;
    }
    public function getTotalPages():int{
        return ceil($this->total / $this->limit);   
    }
    
    public function paginate($dql, $page = 1):Paginator{
        $paginator = new Paginator($dql);
        
        $paginator->getQuery()
            ->setFirstResult($this->limit * ($page -1))
            ->setMaxResults($this->limit);
        
        $this->total = $paginator->count();
        
        return $paginator;
    }
    
    public function findAllEntities(int $paginaActual =1):Paginator{
       $consulta = $this->entityManager->createQuery(
           "SELECT p
            FROM $this->entityType p
            ORDER BY p.id DESC"
           );
       
       return $this->paginate($consulta, $paginaActual);
    }

    public function findMyEntities(int $paginaActual =1, $myplace):Paginator{
       
        //dd($myplace);
        $consulta = $this->entityManager->createQuery(
            "SELECT p
             FROM $this->entityType p
             WHERE p.id LIKE '$myplace'
             ORDER BY p.id DESC"
            );
        
        return $this->paginate($consulta, $paginaActual);
     }
    
}