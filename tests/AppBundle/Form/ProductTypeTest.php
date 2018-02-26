<?php

namespace Tests\AppBundle\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use AppBundle\Command\AddProductCommand;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use AppBundle\Form\ProductType;

class ProductTypeTest extends TypeTestCase
{
    
    /**
     *
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    
    protected function setUp () {
        
        $mToken = $this->getMockBuilder(TokenInterface::class)->getMock ();
        $mToken->method('getUser')->willReturn(new User ('test', 'test'));
        $this->tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();
        $this->tokenStorage->method('getToken')->will ($this->returnValue($mToken));
        
        parent::setup ();
    }
    
    protected function getExtensions() {
        return [
            new PreloadedExtension([new ProductType($this->tokenStorage)], [])
        ];
    }
    
    public function testSubmitValidData()
    {
        
        $data = [
            'name' => 'Nazwa',
            'description' => 'Opis',
            'price' => '10,99'
        ];
        
        $productForm = new AddProductCommand();
        $productForm->name = $data ['name'];
        $productForm->description = $data ['description'];
        $productForm->price = $data ['price'];
        $productForm->owner = $this->tokenStorage->getToken()->getUser();
        
        $form = $this->factory->create(ProductType::class);
        $form->submit($data);
        
        $this->assertTrue($form->isSynchronized());
        $formData = $form->getData ();
        
        $this->assertEquals($productForm, $formData);
        
        $view = $form->createView();
        $children = $view->children;
        
        foreach (array_keys($data) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
    
}

