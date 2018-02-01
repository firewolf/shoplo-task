<?php
namespace AppBundle\dao;

use AppBundle\Entity\ProductForm;
use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectManager;

class ProductDao
{
    
    /**
     * 
     * @var ObjectManager
     */
    private $manager;
    
    public function __construct (ObjectManager $manager) {
        $this->manager = $manager;
    }
    
    public function save (ProductForm $form, $owner) {
        
        $product = new Product();
        $product->setName($form->name);
        $product->setDescription($form->description);
        $product->setPrice($form->price);
        $product->setOwner($owner);
        
        $this->manager->persist($product);
        $this->manager->flush ();
        
    }
    
    public function findAll () : array {
        return $this->manager->getRepository(Product::class)->findAll();
    }
    
}

