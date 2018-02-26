<?php

namespace AppBundle\Command;

use AppBundle\Entity\Product;

/**
 * 
 * @author tmroczkowski
 *
 */
class MailProductAddedCommand
{
    /**
     * 
     * @var Product
     */
    public $product;
    
    /**
     * 
     * @param Product $product
     */
    public function __construct (Product $product) {
        $this->product = $product;
    }
}

