<?php
namespace AppBundle\Service;

use Symfony\Component\Security\Core\User\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Entity\Product;
use AppBundle\Repository\DoctrineProductRepository;

class ProductServiceTest extends KernelTestCase
{
    /**
     * @var RegistryInterface
     */
    private $doctrine;
    
    /**
     *
     * @var ObjectManager
     */
    private $manager;
    
    /**
     * 
     * @var IProductService
     */
    private $productService;
    
    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->doctrine = $kernel->getContainer()->get('doctrine');
        $this->manager = $this->doctrine->getManager ();
        
        $this->productService = new ProductServiceImpl(new DoctrineProductRepository($this->doctrine));
    }
    
    public function testAdd () {
        
        $product = new Product();
        
        $product->setName ('testedProduct 1');
        $product->setDescription('description 2');
        $product->setPrice (0.19);
        $product->setOwner (new User ('test', 'test'));
        
        $result = $this->productService->add($product);
        
        $this->assertNull ($result);
    }
    
    public function testGetList () {
        
        $list = $this->productService->getList('datetime', 'desc', 0, 10);
        $this->assertInternalType('array', $list);
    }
    
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        
        $this->manager->close();
        $this->manager = null;
    }
    
}

