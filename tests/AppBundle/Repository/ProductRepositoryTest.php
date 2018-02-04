<?php

namespace Tests\AppBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Form\ProductForm;
use AppBundle\Repository\ProductRepository;
use Symfony\Component\Security\Core\User\User;
use AppBundle\Factory\ProductFactory;

class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */
    private $doctrine;
    
    /**
     * 
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $manager;
    
    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->doctrine = $kernel->getContainer()->get('doctrine');
        $this->manager = $this->doctrine->getManager ();
    }
    
    public function testSave () {
        
        $product = (new ProductRepository($this->doctrine))->save(
            (new ProductFactory())->form2product(new class () extends ProductForm {
                public $name = 'some name';
                public $description = 'some description';
                public $price = '10,10';
            }, new User('test', 'test'))
        );
        
        $this->assertNotNull($product->getId());
        
        $this->manager->remove ($product);
        $this->manager->flush ();
        
    }
    
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        
        $this->manager->close();
        $this->manager = null; // avoid memory leaks
    }
    
}

