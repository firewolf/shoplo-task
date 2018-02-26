<?php

namespace Tests\AppBundle\Factory;

use AppBundle\Factory\ProductFactory;
use AppBundle\Command\AddProductCommand;
use Symfony\Component\Security\Core\User\User;

/**
 * ProductFactory test case.
 */
class ProductFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated ProductFactoryTest::setUp()
        
        $this->productFactory = new ProductFactory(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated ProductFactoryTest::tearDown()
        $this->productFactory = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests ProductFactory->create()
     */
    public function testCreate()
    {
        
        $command = new AddProductCommand();
        
        $command->name = 'testedProduct 1';
        $command->description = 'description 2';
        $command->price = '0,09';
        $command->owner = new User('test', 'test');
        
        $product = $this->productFactory->create($command);
        
        $this->assertEquals($product->getPrice(), 0.09);
    }
}

