<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    /**
     * @Assert\NotBlank(
     *      message="Pole nie może być puste."
     * )
     * @var unknown
     */
    public $name;
    
    /**
     * @Assert\NotBlank(
     *  message="Pole nie może być puste."
     * )
     * @Assert\Length(
     *      min=2, 
     *      minMessage="Opis musi mieć co najmniej {{ limit }} znaków."
     * )
     * @var unknown
     */
    public $description;
    
    /**
     * @Assert\NotBlank(
     *  message="Pole nie może być puste."
     * )
     * @Assert\Regex(
     *      pattern="/^\d+(,\d\d?)?$/", 
     *      message="Proszę podać prawidłową cenę."
     * )
     * @var unknown
     */
    public $price;
    
    
}

