<?php
namespace AppBundle\Form;

use Symfony\Component\Form\Test\TypeTestCase;

class ProductTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $data = [
            'name' => 'Nazwa',
            'description' => 'Opis',
            'price' => '10,99'
        ];
        
        $productForm = new ProductForm();
        $productForm->name = $data ['name'];
        $productForm->description = $data ['description'];
        $productForm->price = $data ['price'];
        
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

