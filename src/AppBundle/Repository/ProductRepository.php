<?php

namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductRepository extends ServiceEntityRepository
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
     * @return \AppBundle\Entity\Product
     */
    public function save (Product $product) {
        
        $this->manager->persist($product);
        $this->manager->flush ();
        
        return $product;
    }
    
    /**
     * 
     * @param int $id
     * @return object|NULL
     */
    public function findById (int $id) : Product {
        return $this->manager->find(Product::class, $id);
    }
    
    /**
     * 
     * @return \Doctrine\ORM\Query
     */
    public function getPaginatorQuery () : Query {
        return $this->manager->createQuery('SELECT product FROM AppBundle\Entity\Product product');
    }
    
}

