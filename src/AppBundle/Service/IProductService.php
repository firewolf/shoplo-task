<?php

namespace AppBundle\Service;

use Ramsey\Uuid\Uuid;
use AppBundle\Entity\Product;
use AppBundle\Query\ProductView;

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
     * //TODO array
     * @return array - array <ProductView>
     */
    public function getList (string $orderBy, string $direction, int $startFrom, int $limit) : array;
    
    /**
     * 
     * @param Uuid $id
     * @return Product
     */
    public function getById (Uuid $id) : ProductView;
    
    /**
     * 
     * @return int
     */
    public function countProducts () : int;
}

