<?php

namespace AppBundle\Subscribers;

use AppBundle\Entity\Product;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Mail\NewProductAddedMail;
use AppBundle\Factory\ProductViewFactory;
use AppBundle\Events\CommandHandledEvent;
use AppBundle\Command\AddProductCommand;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductAddEventSubscriber
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
    public function __invoke (CommandHandledEvent $event)
    {
        $command = $event->command;
        
        if ($command instanceof AddProductCommand) {
            $this->newProductAddedMail->sendMessage($command);
        }
    }
}

