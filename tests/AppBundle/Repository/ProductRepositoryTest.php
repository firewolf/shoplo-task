<?php

namespace Tests\AppBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Form\ProductForm;
use AppBundle\Repository\ProductRepository;
use Symfony\Component\Security\Core\User\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use AppBundle\Factory\ProductFactory;

class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */
    private $em;
    
    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine');
    }
    
    public function testSave () {
        
        $form = new ProductForm();
        $form->name = 'some name';
        $form->description = 'some description';
        $form->price = '10,10';
        
        $repository = new ProductRepository($this->em);
        $product = $repository->save((new ProductFactory())->form2product($form, new User('test', 'test')));
        
        $this->assertNotNull($product->getId());
        $this->em->getManager()->remove ($product);
        $this->em->getManager()->flush ();
        
    }
    
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        
        $this->em->getManager()->close();
        $this->em = null; // avoid memory leaks
    }
    
}

