<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @var float
     */
    private $price;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $owner;
    
    /**
     * @ORM\Column(type="datetime", options={"default" = "CURRENT_TIMESTAMP"})
     * @var \DateTime
     */
    private $datetime;
    
    /**
     * @return the $datetime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param field_type $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return the $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param field_type $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param field_type $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param field_type $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}

