<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Product;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Mail\NewProductAddedMail;
use AppBundle\Factory\ProductViewFactory;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductAddListener
{

    /**
     *
     * @var NewProductAddedMail
     */
    private $newProductAddedMail;
    
    /**
     * 
     * @var ProductViewFactory
     */
    private $factory;
    
    /**
     * 
     * @param NewProductAddedMail $newProductAddedMail
     */
    public function __construct(NewProductAddedMail $newProductAddedMail, ProductViewFactory $factory)
    {
        $this->newProductAddedMail = $newProductAddedMail;
        $this->factory = $factory;
    }

    /**
     * 
     * @param Product $product
     */
    public function postPersist (LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        if ($entity instanceof Product) {
            $view = $this->factory->create($entity);
            $this->newProductAddedMail->sendMessage($view);
        }
    }
}

