<?php

namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityManager;
use Ramsey\Uuid\Uuid;

/**
 * 
 * 
 * @author tmroczkowski
 */
class DoctrineProductRepository extends ServiceEntityRepository implements IProductRepository
{
    
    /**
     * 
     * @var EntityManager
     */
    private $manager;
    
    /**
     * 
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
        $this->manager = $this->getEntityManager();
    }
    
    /**
     * 
     * @param Product $product
     */
    public function save (Product $product) : void {
        $this->manager->persist($product);
        $this->manager->flush ();
    }
    
    /**
     * 
     * @param int $id
     * @return object|NULL
     */
    public function findById (Uuid $id) : Product {
        return $this->manager->find(Product::class, $id);
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Repository\IProductRepository::findByCriteria()
     */
    public function findByCriteria(string $orderBy, string $direction, int $startFrom, int $limit): array
    {
        $queryBuilder = $this->manager->createQueryBuilder();
        
        $query = $queryBuilder->select('product');
        
        $query->from('AppBundle\Entity\Product', 'product');
        $query->orderBy('product.' . $orderBy, $direction);
        $query->setMaxResults($limit);
        $query->setFirstResult($startFrom);
            
        return $query->getQuery()->getResult();
    }

    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Repository\IProductRepository::countProducts()
     */
    public function countProducts () : int {
        
        $queryBuilder = $this->manager->createQueryBuilder();
        
        $query = $queryBuilder->select('count (product.id)');
        $query->from('AppBundle\Entity\Product', 'product');
        
        return (int) $query->getQuery ()->getSingleScalarResult();
    }
    
    
}

