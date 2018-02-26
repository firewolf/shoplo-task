<?php
namespace AppBundle\Query;

/**
 * 
 * 
 * @author tmroczkowski
 */
class Result
{
    /**
     * 
     * @var array
     */
    public $items = [];
    
    /**
     * 
     * @var int
     */
    public $count = 0;
    
    /**
     * 
     * @param array $items
     * @param int $count
     */
    public function __construct (array $items, int $count) {
        $this->items = $items;
        $this->count = $count;
    }
}

