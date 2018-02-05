<?php

namespace Tests\AppBundle\Repository;

use AppBundle\Mailer\ProductMailer;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductMailerTest extends KernelTestCase
{
    
    /**
     * 
     * @var ProductMailer
     */
    private $mailer;
    
    public function setUp()
    {
        //start the symfony kernel
        $kernel = static::createKernel();
        $kernel->boot();
        
        $this->mailer = $kernel->getContainer()->get('AppBundle\Mailer\ProductMailer');
    }
    
    public function testNotify () {
        
        $mailSentCount = $this->mailer->notify(new class () extends Product {
           public $name = 'test';
           public $description = 'description';
           public $price = 0.0;
        });
        
        $this->assertEquals (1, $mailSentCount);
        
    }
    
    public function setProductMailer (ProductMailer $mailer) {
        $this->mailer = $mailer;
    }
    
}

