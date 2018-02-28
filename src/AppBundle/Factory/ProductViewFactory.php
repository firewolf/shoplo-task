<?php

namespace AppBundle\Factory;

use AppBundle\Query\ProductView;
use AppBundle\Entity\Product;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductViewFactory
{
    
    /**
     * 
     * @param Product $product
     * @return ProductView
     */
    public function create (Product $product) : ProductView {
        return new ProductView(
            $product->getName(), 
            number_format($product->getPrice(), 2, ',', ' '), 
            $product->getDatetime()->format('Y-m-d'), 
            $product->getDatetime()->format('H:i:s'), 
            $product->getOwner(),
            $product->getDescription()
        );
    }
}