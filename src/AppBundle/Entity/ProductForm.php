<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ProductForm
{
    /**
     * @Assert\NotBlank(
     *      message="Pole nie może być puste."
     * )
     * @var string
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
     * @var string
     */
    public $description;
    
    /**
     * @Assert\NotBlank(
     *  message="Pole nie może być puste."
     * )
     * @Assert\Regex(
     *      pattern="/^\d+(,\d\d?)?$/", 
     *      message="Proszę wpisać cenę w formacie: [0-9]+(,[0,9]{1,2})?"
     * )
     * @var string
     */
    public $price;
    
}

