<?php

namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Security\Core\User\User;
use AppBundle\Form\ProductForm;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductRepository extends ServiceEntityRepository
{
    
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
     * @param unknown $id
     * @return object|NULL
     */
    public function findById ($id) {
        return $this->manager->find(Product::class, $id);
    }
    
    /**
     * 
     * @return \Doctrine\ORM\Query
     */
    public function getPaginatorQuery () {
        return $this->manager->createQuery('SELECT product FROM AppBundle\Entity\Product product');
    }
    
}

