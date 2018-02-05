<?php
namespace AppBundle\Factory;

use AppBundle\Form\ProductForm;
use Symfony\Component\Security\Core\User\User;
use AppBundle\Entity\Product;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductFactory
{
    
    /**
     * 
     * @param ProductForm $form
     * @param User $owner
     * @return \AppBundle\Entity\Product
     */
    public function form2product (ProductForm $form, User $owner) : Product {
        
        $product = new Product();
        
        $product->setName($form->name);
        $product->setDescription($form->description);
        
        $product->setPrice(
            str_replace(',', '.', $form->price) * 1.0
        );
        
        $product->setOwner($owner);
        $product->setDatetime(new \DateTime());
        
        return $product;
        
    }
    
}

