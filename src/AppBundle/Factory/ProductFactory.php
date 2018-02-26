<?php
namespace AppBundle\Factory;

use Symfony\Component\Security\Core\User\User;
use AppBundle\Entity\Product;
use AppBundle\Command\AddProductCommand;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductFactory
{
    
    /**
     * 
     * @param AddProductCommand $command
     * @param User $owner
     * @return Product
     */
    public function create (AddProductCommand $command) : Product {
        
        $product = new Product();
        
        $product->setName($command->name);
        $product->setDescription($command->description);
        
        $product->setPrice(
            str_replace(',', '.', $command->price) * 1.0
        );
        
        $product->setOwner($command->owner);
        
        return $product;
    }
}