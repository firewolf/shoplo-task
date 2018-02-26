<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Product;
use Doctrine\ORM\Event\LifecycleEventArgs;
use SimpleBus\Message\Bus\MessageBus;
use AppBundle\Command\MailProductAddedCommand;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductAddListener
{

    /**
     *
     * @var MessageBus
     */
    private $commandBus;
    
    /**
     * 
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $twig
     * @param array $receivers
     * @param string $from
     */
    public function __construct(MessageBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * 
     * @param Product $product
     */
    public function postPersist (LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        if ($entity instanceof Product) {
            $this->commandBus->handle(new MailProductAddedCommand($entity));
        }
    }
}

