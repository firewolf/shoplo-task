<?php

namespace Tests\AppBundle\CommandHandler;

use AppBundle\Command\AddProductCommand;
use Symfony\Component\Security\Core\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Factory\ProductFactory;
use AppBundle\CommandHandler\AddProductHandler;
use AppBundle\Service\ProductServiceImpl;
use AppBundle\Repository\DoctrineProductRepository;
use AppBundle\Factory\ProductViewFactory;

/**
 * 
 * AddProductCommandHandler test case.
 */
class AddProductCommandHandlerTest extends KernelTestCase
{

    /**
     *
     * @var AddProductHandler
     */
    private $addProductHandler;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        $kernel = self::bootKernel();
        
        $this->addProductHandler = new AddProductHandler(
            new ProductServiceImpl(
                new DoctrineProductRepository($kernel->getContainer()->get('doctrine')),
                new ProductViewFactory()
            ),
            new ProductFactory()
        );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated AddProductCommandHandlerTest::tearDown()
        $this->addProductHandler = null;
        
        parent::tearDown();
    }

    /**
     * 
     * Tests AddProductCommandHandler->handle()
     */
    public function testHandle()
    {
        
        $command = new AddProductCommand();
        
        $command->name = 'testedProduct 1';
        $command->description = 'description 2';
        $command->price = '0,09';
        $command->owner = new User('test', 'test');
        
        $result = $this->addProductHandler->handle($command);
        
        $this->assertNull($result);
    }
}

