<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Product;
use Ramsey\Uuid\Uuid;

/**
 * 
 * 
 * @author tmroczkowski
 */
interface IProductRepository
{
    
    /**
     *
     * @param Product $product
     */
    public function save (Product $product) : void;
    
    /**
     *
     * @param int $id
     * @return object|NULL
     */
    public function findById (Uuid $id) : Product;
    
    /**
     *
     * @return array
     */
    public function findByCriteria (
        string $orderBy, 
        string $direction, 
        int $startFrom, 
        int $limit
    ) : array;
    
    /**
     * 
     * @return int
     */
    public function countProducts () : int;
}

