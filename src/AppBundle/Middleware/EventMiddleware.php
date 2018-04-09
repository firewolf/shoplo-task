<?php

namespace AppBundle\Middleware;

use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;
use SimpleBus\Message\Bus\MessageBus;
use AppBundle\Events\CommandHandledEvent;

class EventMiddleware implements MessageBusMiddleware
{
    
    /**
     * 
     * @var MessageBus
     */
    private $messageBus;
    
    public function __construct(MessageBus $messageBus) {
        $this->messageBus = $messageBus;
    }
    
    public function handle($message, callable $next)
    {
        $next ($message);
        $this->messageBus->handle(new CommandHandledEvent($message));
    }

}

