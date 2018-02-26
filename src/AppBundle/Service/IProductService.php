<?php

namespace AppBundle\Service;

use Doctrine\ORM\Query;
use Ramsey\Uuid\Uuid;
use AppBundle\Entity\Product;

/**
 * 
 * 
 * @author tmroczkowski
 */
interface IProductService
{
    /**
     * 
     * @param Product $product
     */
    public function add (Product $product) : void;
    
    /**
     * //TODO Query
     * @return Query
     */
    public function getList (string $orderBy, string $direction, int $startFrom, int $limit) : array;
    
    /**
     * 
     * @param Uuid $id
     * @return Product
     */
    public function getById (Uuid $id) : Product;
    
    /**
     * 
     * @return int
     */
    public function countProducts () : int;
}

