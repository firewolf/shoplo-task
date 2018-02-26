<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

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
     * @ORM\Id
     * @ORM\Column(type="uuid")
     * @var UuidInterface
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
    
    public function __construct() {
        $this->id = Uuid::uuid4();
        $this->datetime = new \DateTime();
    }
    
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
     * @return UuidInterface $id
     */
    public function getId() : UuidInterface
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
    public function setId(Uuid $id)
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

