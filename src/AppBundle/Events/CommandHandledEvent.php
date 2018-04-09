<?php

namespace AppBundle\Events;

class CommandHandledEvent
{
    public $command;
    
    public function __construct($command) {
        $this->command = $command;
    }
}