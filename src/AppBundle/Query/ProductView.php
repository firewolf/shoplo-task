<?php

namespace AppBundle\Query;

final class ProductView
{
    
    /**
     *
     * @var string
     */
    public $name;
    
    /**
     *
     * @var string
     */
    public $price;
    
    /**
     *
     * @var string
     */
    public $date;
    
    /**
     *
     * @var string
     */
    public $time;
    
    /**
     *
     * @var string
     */
    public $owner;
    
    /**
     * 
     * @var string
     */
    public $description;
    
    /**
     * 
     * @param string $name
     * @param string $price
     * @param string $date
     * @param string $time
     * @param string $owner
     */
    public function __construct (string $name, string $price, string $date, string $time, string $owner, string $description) {
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
        $this->time = $time;
        $this->owner = $owner;
    }
}

