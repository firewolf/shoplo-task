<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    /**
     * @Assert\NotBlank(message="Pole nie mo�e by� puste.")
     * @var unknown
     */
    public $name;
    
    /**
     * @Assert\Length(min=100, minMessage="Opis musi mie� co najmniej {{ limit }} znak�w.")
     * @var unknown
     */
    public $description;
    
    /**
     * @Assert\Currency(message="Prosz� poda� prawid�ow� cen�.")
     * @var unknown
     */
    public $price;
    
    
}

