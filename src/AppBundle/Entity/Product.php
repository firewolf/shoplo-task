<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @author tmroczkowski
 */
class Product
{
    
    /**
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    
    /**
     * 
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;
    
    /**
     * 
     * @ORM\Column(type="decimal", scale=2)
     * @var float
     */
    private $price;
    
    /**
     * 
     * @ORM\Column(type="text")
     * @var string
     */
    private $description;
    
    /**
     * 
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $owner;
    
    /**
     * 
     * @ORM\Column(type="datetime", options={"default" = "CURRENT_TIMESTAMP"})
     * @var \DateTime
     */
    private $datetime;
    
    /**
     * @return \DateTime $datetime
     */
    public function getDatetime() : \DateTime
    {
        return $this->datetime;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime(\DateTime $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string $owner
     */
    public function getOwner() : string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return int $id
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string $name
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return float $price
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @return string $description
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

}

