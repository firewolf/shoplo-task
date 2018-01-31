<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    /**
     * @Assert\NotBlank(message="Pole nie mo¿e byæ puste.")
     * @var unknown
     */
    public $name;
    
    /**
     * @Assert\Length(min=100, minMessage="Opis musi mieæ co najmniej {{ limit }} znaków.")
     * @var unknown
     */
    public $description;
    
    /**
     * @Assert\Currency(message="Proszê podaæ prawid³ow¹ cenê.")
     * @var unknown
     */
    public $price;
    
    
}

